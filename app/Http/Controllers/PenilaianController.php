<?php

namespace App\Http\Controllers;

use App\Models\Restorant;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $restorants = Restorant::all();
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::all();

        return view('penilaian.index', compact('restorants', 'kriterias', 'penilaians'));
    }

    public function create()
    {
        $restorants = Restorant::all();
        $kriterias = Kriteria::all();

        return view('penilaian.create', compact('restorants', 'kriterias'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $restorantId = $request->input('restorant_id');

        DB::beginTransaction();
        foreach ($data as $key => $value) {
            if ($key != 'restorant_id') {
                Penilaian::updateOrCreate(
                    ['restorant_id' => $restorantId, 'kriteria_id' => $key],
                    ['nilai' => $value]
                );
            }
        }
        DB::commit();

        return redirect()->route('penilaian.index')->with('toast_success', 'Penilaian alternatif diperbarui!');
    }

    public function getForms(Request $request)
    {
        $id = $request->id;
        $forms = Penilaian::with(['restorant', 'kriteria'])
            ->where('restorant_id', $id)
            ->get();

        $restorants = Restorant::find($id);
        $kriterias = Kriteria::all();

        return view('penilaian.edit', compact('forms', 'restorants', 'kriterias'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method', 'restorant_id']);
        $id = $request->only('restorant_id')['restorant_id'];
        $restorants = Restorant::find($id);

        DB::beginTransaction();
        foreach ($data as $key => $value) {
            DB::table('penilaians')
                ->where('id', '=', $key)
                ->update(['nilai' => $value]);
        }
        DB::commit();

        return redirect()->route('penilaian.index')->with('toast_success', 'Penilaian alternatif ' . $restorants->nama. ' diperbarui!');
    }

    public function calculate()
    {
        $restorants = Restorant::all();
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::all();

        // Normalisasi bobot
        $totalBobot = $kriterias->sum('kategori');
        foreach ($kriterias as $kriteria) {
            $kriteria->bobot_normalized = $kriteria->bobot / $totalBobot;
        }

        // Matrix Penilaian
        $matrixPenilaian = [];
        foreach ($restorants as $restorant) {
            foreach ($kriterias as $kriteria) {
                $penilaian = $penilaians->where('restorant_id', $restorant->id)->where('kriteria_id', $kriteria->id)->first();
                $matrixPenilaian[$restorant->id][$kriteria->id] = $penilaian ? $penilaian->nilai : 0;
            }
        }

        // Normalisasi Matriks
        $matrixNormalisasi = [];
        foreach ($kriterias as $kriteria) {
            $nilaiMax = $penilaians->where('kriteria_id', $kriteria->id)->max('nilai');
            $nilaiMin = $penilaians->where('kriteria_id', $kriteria->id)->min('nilai');

            foreach ($restorants as $restorant) {
                if ($kriteria->kategori == 'Benefit') {
                    $matrixNormalisasi[$restorant->id][$kriteria->id] = $matrixPenilaian[$restorant->id][$kriteria->id] / $nilaiMax;
                } else {
                    $matrixNormalisasi[$restorant->id][$kriteria->id] = $nilaiMin / $matrixPenilaian[$restorant->id][$kriteria->id];
                }
            }
        }

        // Nilai Preferensi
        $nilaiPreferensi = [];
        foreach ($restorants as $restorant) {
            $nilaiPreferensi[$restorant->id] = 0;
            foreach ($kriterias as $kriteria) {
                $nilaiPreferensi[$restorant->id] += $matrixNormalisasi[$restorant->id][$kriteria->id] * $kriteria->bobot_normalized;
            }
        }

        // Perankingan
        arsort($nilaiPreferensi);

        return view('penilaian.calculate', compact('restorants', 'kriterias', 'matrixPenilaian', 'matrixNormalisasi', 'nilaiPreferensi'));
    }

    public function destroy($id)
    {
        $restorant = Restorant::find($id);
        

        if ($restorant) {
            $restorant->delete();
            return redirect()->route('penilaian.index')->with('toast_success', 'Penilaian berhasil dihapus!');
        } else {
            return redirect()->route('penilaian.index')->with('toast_error', 'Penilaian tidak ditemukan!');
        }
    }
}