<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view(
            'admin.index',
            compact('admins')
        );
    }

    public function create()
    {
        return view(
            'admin.create'
        );
    }

    public function store(Request $request)
    {
        Admin::create([

            'username' =>
            $request->username,

            'password' =>
            Hash::make(
                $request->password
            )

        ]);

        return redirect('/admin')
            ->with(
                'success',
                'Admin berhasil ditambahkan'
            );
    }
}