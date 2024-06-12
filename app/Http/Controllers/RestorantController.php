<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restorant;


class RestorantController extends Controller
{

   /* public function show($id)
    {
        $restorant = Restorant::find($id);
    
        if (!$restorant) {
            abort(404, 'Restoran tidak ditemukan');
        }
    
        return view('restoran.show', compact('restoran'));
    }
    */
    

    public function index()
    {
        $restorants = Restorant::all();
        return view('restorant.index', compact('restorants'));
    }

    public function create()
    {
        return view('restorant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            
        ]);

        Restorant::create($request->all());

        return redirect()->route('restorant.index')
            ->with('success', 'Restorant baru berhasil ditambahkan.');
    }

    // public function show($id)
    // {
    //     $restorant = Restorant::findOrFail($id);
    //     return view('restorant.show', ['restorant' => $restorant]);
    // }   

    public function edit($id)
    {
        $restorant = Restorant::findOrFail($id);
        return view('restorant.edit', compact('restorant')); 

    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama' => 'required',
            
        ]);

        $restorant = Restorant::findOrFail($id);

        $restorant->nama = $request->input('nama');
        
    
    // Simpan perubahan
    $restorant->save();

        return redirect()->route('restorant.index')
            ->with('success', 'Data restoran berhasil diperbarui.');
    }

    public function destroy(Restorant $restorant)
    {
        $restorant->delete();

        return redirect()->route('restorant.index')
            ->with('success', 'Data restoran berhasil dihapus.');
    }
}
