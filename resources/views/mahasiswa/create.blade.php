@extends('layouts.app')

@section('content')

<h2>Tambah Mahasiswa</h2>

<form action="/mahasiswa/store"
      method="POST">

    @csrf

    <div class="mb-3">

        <label>NIM</label>

        <input
            type="text"
            name="nim"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Nama</label>

        <input
            type="text"
            name="nama"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Prodi</label>

        <input
            type="text"
            name="prodi"
            class="form-control">

    </div>

    <button
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection
