@extends('layouts.app')

@section('content')

<h2>Registrasi Wajah</h2>

<form
    action="/face-master/store"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="mb-3">

        <label>Mahasiswa</label>

        <select
            name="mahasiswa_id"
            class="form-control">

            @foreach($mahasiswas as $m)

            <option
                value="{{ $m->id }}">

                {{ $m->nim }}
                -
                {{ $m->nama }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Foto Wajah</label>

        <input
            type="file"
            name="foto"
            class="form-control">

    </div>

    <button
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection
