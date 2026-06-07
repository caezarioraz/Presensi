<?php

namespace App\Http\Controllers;

use App\Models\FaceMaster;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FaceMasterController extends Controller
{
    public function index()
    {
        $faces = FaceMaster::all();

        return view(
            'face-master.index',
            compact('faces')
        );
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();

        return view(
            'face-master.create',
            compact('mahasiswas')
        );
    }

    public function store(Request $request)
    {
        $foto = $request->file('foto')
            ->store('faces', 'public');

        $path = storage_path(
            'app/public/' . $foto
        );

        $response = Http::attach(
            'foto',
            file_get_contents($path),
            basename($path)
        )->post(
            'http://127.0.0.1:5000/generate-encoding'
        );

        $data = $response->json();

        FaceMaster::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'foto' => $foto,
            'encoding' => json_encode(
                $data['encoding']
            )
        ]);

        return redirect('/face-master')
            ->with(
                'success',
                'Registrasi wajah berhasil'
            );
    }

    public function testPython()
    {
        $response = Http::get(
            'http://127.0.0.1:5000/test'
        );

        dd($response->json());
    }

    public function uploadToPython($id)
{
    $face = FaceMaster::findOrFail($id);

    $path = storage_path(
        'app/public/' . $face->foto
    );

    $response = Http::attach(
        'foto',
        file_get_contents($path),
        basename($path)
    )->post(
        'http://127.0.0.1:5000/upload'
    );

    return $response->json();
}

    public function generateEncoding()
    {
        $face = FaceMaster::latest()->first();

        $path = storage_path(
            'app/public/' . $face->foto
        );

        $response = Http::attach(
            'foto',
            file_get_contents($path),
            basename($path)
        )->post(
            'http://127.0.0.1:5000/generate-encoding'
        );

        $data = $response->json();

        $face->encoding = json_encode(
            $data['encoding']
        );

        $face->save();

        return "Encoding berhasil disimpan";
    }

    public function mahasiswaFace()
    {
        $face = FaceMaster::where(
            'mahasiswa_id',
            session('mahasiswa_id')
        )->first();

        return view(
            'mahasiswa.face',
            compact('face')
        );
    }

    public function mahasiswaStoreFace(Request $request)
    {
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
            'faces/' . $imageName,
            base64_decode($image)
        );

        $foto = 'faces/' . $imageName;

        $path = storage_path(
            'app/public/' . $foto
        );

        $response = Http::attach(
            'foto',
            file_get_contents($path),
            basename($path)
        )->post(
            'http://127.0.0.1:5000/generate-encoding'
        );

        if (!$response->successful()) {
            return back()->with(
                'error',
                'Gagal menghubungi server Python'
            );
        }

        $data = $response->json();

        if (!isset($data['encoding'])) {
            return back()->with(
                'error',
                'Wajah tidak terdeteksi'
            );
        }

        FaceMaster::updateOrCreate(

            [
                'mahasiswa_id' => session('mahasiswa_id')
            ],

            [
                'foto' => $foto,
                'encoding' => json_encode(
                    $data['encoding']
                )
            ]
        );

        return back()->with(
            'success',
            'Wajah berhasil diregistrasi'
        );
    }
}
