<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('users'));
    }

    public function edit($id)
    {
        return view('profile.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $data = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:10',
        ]);
        if ($request->password !='') {
            $data['password'] = bcrypt($request->passsword);
        }else {
            unset($data['password']);
        }
        $user = auth()->user();
        $user->fill($data);
        $user->save();
        return back();

        // Update data kriteria berdasarkan ID
        // Profile::whereId($id)->update($data);

        // return redirect()->route('profile.index')
        //     ->with('success', 'Data kriteria berhasil diperbarui.');
    }
}
