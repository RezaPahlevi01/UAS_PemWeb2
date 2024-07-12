<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all(); // Mengambil semua data kriteria
        return view('kriteria.index', compact('kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_kriteria' =>'required|string|max:5',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);
    
        Kriteria::create($validatedData);
    
        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id); // Cari kriteria berdasarkan ID
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);

        // Update data kriteria berdasarkan ID
        Kriteria::whereId($id)->update($validatedData);

        return redirect()->route('kriteria.index')
            ->with('success', 'Data kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kriteria = Kriteria::findOrFail($id); // Cari kriteria berdasarkan ID
        $kriteria->delete(); // Hapus kriteria dari database

        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria berhasil dihapus.');
    }
}
