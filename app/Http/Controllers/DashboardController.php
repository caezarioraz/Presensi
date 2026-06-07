<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Presensi;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            [
                'totalMahasiswa' =>
                Mahasiswa::count(),

                'totalPresensi' =>
                Presensi::count(),

                'presensiHariIni' =>
                Presensi::whereDate(
                    'tanggal',
                    today()
                )->count()
            ]
        );
    }
}
