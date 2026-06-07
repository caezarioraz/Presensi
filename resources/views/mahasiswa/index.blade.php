@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Data Mahasiswa</h2>

    <a href="/mahasiswa/create"
       class="btn btn-primary">

        Tambah Mahasiswa

    </a>

</div>

<table class="table table-bordered">

    <thead>

        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>

    </thead>

    <tbody>

        @foreach($mahasiswas as $m)

        <tr>

            <td>{{ $m->nim }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->prodi }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection
