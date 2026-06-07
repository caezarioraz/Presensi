<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where(
            'username',
            $request->username
        )->first();

        if (!$admin) {
            return back()->with(
                'error',
                'Username tidak ditemukan'
            );
        }

        if (
            !Hash::check(
                $request->password,
                $admin->password
            )
        ) {
            return back()->with(
                'error',
                'Password salah'
            );
        }

        session([
            'admin_id' => $admin->id,
            'admin_username' => $admin->username
        ]);

        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}
