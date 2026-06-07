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

            'password' => Hash::make(
                '123456'
            )

        ]);
        return redirect('/mahasiswa');
    }
}
