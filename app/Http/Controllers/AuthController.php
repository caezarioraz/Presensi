<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // VALIDASI INPUT
        $request->validate([
            'role' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // ======================
        // LOGIN ADMIN
        // ======================
        if ($request->role === 'admin') {

            $admin = Admin::where('username', $request->username)->first();

            if ($admin && Hash::check($request->password, $admin->password)) {

                session([
                    'role' => 'admin',
                    'admin_id' => $admin->id,
                    'admin_username' => $admin->username,
                ]);

                return redirect('/dashboard');
            }
        }

        // ======================
        // LOGIN MAHASISWA
        // ======================
        if ($request->role === 'mahasiswa') {

            $mahasiswa = Mahasiswa::where('nim', $request->username)->first();

            if ($mahasiswa && Hash::check($request->password, $mahasiswa->password)) {

                session([
                    'role' => 'mahasiswa',
                    'mahasiswa_id' => $mahasiswa->id,
                    'mahasiswa_nama' => $mahasiswa->nama,
                    'mahasiswa_nim' => $mahasiswa->nim,
                ]);

                return redirect('/mahasiswa/dashboard');
            }
        }

        // ======================
        // LOGIN GAGAL
        // ======================
        return back()->with('error', 'Username / Password / Role salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}