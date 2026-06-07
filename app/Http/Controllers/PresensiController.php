<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaceMaster;
use App\Models\Presensi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    // =========================
    // HALAMAN PRESENSI ADMIN
    // =========================
    public function index()
    {
        return view('presensi.index');
    }

    // =========================
    // VERIFIKASI PRESENSI ADMIN
    // =========================
    public function verify(Request $request)
    {
        $request->validate([
            'foto' => 'required|image'
        ]);

        $face = FaceMaster::latest()->first();

        if (!$face) {
            return back()->with('error', 'Data wajah tidak ditemukan');
        }

        $response = Http::attach(
            'foto',
            file_get_contents($request->file('foto')->getRealPath()),
            $request->file('foto')->getClientOriginalName()
        )->post('http://127.0.0.1:5000/verify-face', [
            'encoding' => $face->encoding
        ]);

        $result = $response->json();

        if (!$result || !isset($result['verified'])) {
            return back()->with('error', 'Server Python error');
        }

        if ($result['verified'] !== true) {
            return back()->with('error', 'Wajah tidak dikenali');
        }

        $cek = Presensi::where('mahasiswa_id', $face->mahasiswa_id)
            ->whereDate('tanggal', today())
            ->exists();

        if ($cek) {
            return back()->with('error', 'Hari ini sudah presensi');
        }

        $foto = $request->file('foto')->store('presensi', 'public');

        Presensi::create([
            'mahasiswa_id' => $face->mahasiswa_id,
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
            'status' => 'Hadir',
            'foto_bukti' => $foto,
            'distance' => $result['distance'] ?? null
        ]);

        return back()->with('success', 'Presensi berhasil');
    }

    // =========================
    // DATA PRESENSI ADMIN
    // =========================
    public function data()
    {
        $presensis = Presensi::with('mahasiswa')
            ->latest()
            ->get();

        return view('presensi.data', compact('presensis'));
    }

    // =========================
    // HALAMAN PRESENSI MAHASISWA
    // =========================
    public function mahasiswaPresensi()
    {
        return view('mahasiswa.presensi');
    }

    // =========================
    // VERIFIKASI PRESENSI MAHASISWA
    // =========================
    public function mahasiswaVerify(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $image = $request->image;

        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);

        $imageName = time() . '.png';

        Storage::disk('public')->put(
            'presensi/' . $imageName,
            base64_decode($image)
        );

        $face = FaceMaster::where('mahasiswa_id', session('mahasiswa_id'))->first();

        if (!$face) {
            return back()->with('error', 'Silakan registrasi wajah terlebih dahulu');
        }

        $path = storage_path('app/public/presensi/' . $imageName);

        $response = Http::attach(
            'foto',
            file_get_contents($path),
            $imageName
        )->post('http://127.0.0.1:5000/verify-face', [
            'encoding' => $face->encoding
        ]);

        $result = $response->json();

        if (!$result || !isset($result['verified'])) {
            return back()->with('error', 'Server Python error');
        }

        if ($result['verified'] !== true) {
            return back()->with(
                'error',
                'Wajah tidak dikenali. Distance: ' . ($result['distance'] ?? '-')
            );
        }

        $cek = Presensi::where('mahasiswa_id', session('mahasiswa_id'))
            ->whereDate('tanggal', today())
            ->exists();

        if ($cek) {
            return back()->with('error', 'Anda sudah presensi hari ini');
        }

        Presensi::create([
            'mahasiswa_id' => session('mahasiswa_id'),
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
            'status' => 'Hadir',
            'foto_bukti' => 'presensi/' . $imageName,
            'distance' => $result['distance'] ?? null
        ]);

        return back()->with('success', 'Presensi berhasil');
    }
}