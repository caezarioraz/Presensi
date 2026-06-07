<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();

        return view(
            'mahasiswa.index',
            compact('mahasiswas')
        );
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'password' => Hash::make('123456')
        ]);

        return redirect('/mahasiswa')
            ->with(
                'success',
                'Mahasiswa berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view(
            'mahasiswa.edit',
            compact('mahasiswa')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi
        ]);

        return redirect('/mahasiswa')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();

        return redirect('/mahasiswa')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}