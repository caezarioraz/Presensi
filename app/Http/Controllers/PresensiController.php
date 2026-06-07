<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaceMaster;
use Illuminate\Support\Facades\Http;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class PresensiController extends Controller
{
    public function index()
    {
        return view('presensi.index');
    }

    public function verify(Request $request)
    {
        $face = FaceMaster::latest()->first();

        if (!$face) {
            return back()->with('error', 'Data wajah tidak ditemukan');
        }

        $encoding = $face->encoding;

        $response = Http::attach(
            'foto',
            file_get_contents($request->file('foto')->getRealPath()),
            $request->file('foto')->getClientOriginalName()
        )->post('http://127.0.0.1:5000/verify-face', [
            'encoding' => $encoding
        ]);

        // AMBIL JSON AMAN
        $result = $response->json();

        if (!$result || !isset($result['verified'])) {
            return back()->with('error', 'Server Python error');
        }

        // WAJAH TIDAK COCOK
        if ($result['verified'] !== true) {
            return back()->with('error', 'Wajah tidak dikenali');
        }

        // CEK PRESENSI GANDA
        $cek = Presensi::where('mahasiswa_id', $face->mahasiswa_id)
            ->whereDate('tanggal', today())
            ->exists();

        if ($cek) {
            return back()->with('error', 'Hari ini sudah presensi');
        }

        // SIMPAN FOTO
        $foto = $request->file('foto')->store('presensi', 'public');

        // SIMPAN PRESENSI
        Presensi::create([
            'mahasiswa_id' => $face->mahasiswa_id,
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
            'status' => 'Hadir',
            'foto_bukti' => $foto,
            'distance' => $result['distance']
        ]);

        return back()->with('success', 'Presensi berhasil');
    }

    public function data()
    {
        $presensis = Presensi::with(
            'mahasiswa'
        )
            ->latest()
            ->get();

        return view(
            'presensi.data',
            compact('presensis')
        );
    }

    public function mahasiswaPresensi()
    {
        return view(
            'mahasiswa.presensi'
        );
    }

    public function mahasiswaVerify(Request $request)
    {

        // =========================
        // SIMPAN HASIL CAPTURE
        // =========================

        $image = $request->image;

        $image = str_replace(
            'data:image/png;base64,',
            '',
            $image
        );

        $image = str_replace(
            ' ',
            '+',
            $image
        );

        $imageName = time() . '.png';

        Storage::disk('public')->put(
            'presensi/' . $imageName,
            base64_decode($image)
        );

        // =========================
        // CEK DATA WAJAH
        // =========================

        $face = FaceMaster::where(
            'mahasiswa_id',
            session('mahasiswa_id')
        )->first();

        if (!$face) {

            return back()->with(
                'error',
                'Silakan registrasi wajah terlebih dahulu'
            );
        }

        // =========================
        // KIRIM KE PYTHON
        // =========================

        $path = storage_path(
            'app/public/presensi/' . $imageName
        );

        $response = Http::attach(
            'foto',
            file_get_contents($path),
            $imageName
        )->post(
            'http://127.0.0.1:5000/verify-face',
            [
                'encoding' => $face->encoding
            ]
        );

        $result = $response->json();

        if (
            !$result ||
            !isset($result['verified'])
        ) {

            return back()->with(
                'error',
                'Server Python error'
            );
        }

        // =========================
        // FACE TIDAK COCOK
        // =========================

        if ($result['verified'] !== true) {

            return back()->with(
                'error',
                'Wajah tidak dikenali. Distance: ' .
                    $result['distance']
            );
        }

        // =========================
        // CEK PRESENSI GANDA
        // =========================

        $cek = Presensi::where(
            'mahasiswa_id',
            session('mahasiswa_id')
        )
            ->whereDate(
                'tanggal',
                today()
            )
            ->exists();

        if ($cek) {

            return back()->with(
                'error',
                'Anda sudah presensi hari ini'
            );
        }

        // =========================
        // SIMPAN PRESENSI
        // =========================

        Presensi::create([

            'mahasiswa_id' =>
            session('mahasiswa_id'),

            'tanggal' =>
            now()->toDateString(),

            'jam_masuk' =>
            now()->toTimeString(),

            'status' =>
            'Hadir',

            'foto_bukti' =>
            'presensi/' . $imageName,

            'distance' =>
            $result['distance']

        ]);

        return back()->with(
            'success',
            'Presensi berhasil'
        );
    }
}
