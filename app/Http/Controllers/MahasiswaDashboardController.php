<?php

namespace App\Http\Controllers;

use App\Models\FaceMaster;
use App\Models\Presensi;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $face = FaceMaster::where(
            'mahasiswa_id',
            session('mahasiswa_id')
        )->first();

        $totalPresensi = Presensi::where(
            'mahasiswa_id',
            session('mahasiswa_id')
        )->count();

        return view(
            'mahasiswa.dashboard',
            compact(
                'face',
                'totalPresensi'
            )
        );
    }
}