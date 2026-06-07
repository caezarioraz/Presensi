<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaAuthController extends Controller
{
    public function loginForm()
    {
        return view('mahasiswa.login');
    }

    public function login(Request $request)
    {
        $mahasiswa = Mahasiswa::where(
            'nim',
            $request->nim
        )->first();

        if (!$mahasiswa) {
            return back()->with(
                'error',
                'NIM tidak ditemukan'
            );
        }

        if (
            !Hash::check(
                $request->password,
                $mahasiswa->password
            )
        ) {
            return back()->with(
                'error',
                'Password salah'
            );
        }

        session([

            'mahasiswa_id'
            => $mahasiswa->id,

            'mahasiswa_nama'
            => $mahasiswa->nama

        ]);

        return redirect(
            '/mahasiswa/dashboard'
        );
    }

    public function dashboard()
    {
        return view(
            'mahasiswa.dashboard'
        );
    }
}
