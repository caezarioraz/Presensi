@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">


<h2 class="fw-bold mb-0">
    Data Mahasiswa
</h2>

<a href="/mahasiswa/create"
   class="btn btn-primary">

    <i class="bi bi-plus-circle"></i>
    Tambah Mahasiswa

</a>


</div>

@if(session('success'))

<div class="alert alert-success">


{{ session('success') }}


</div>

@endif

<div class="card border-0 shadow-sm">


<div class="card-body">

    <table class="table table-hover align-middle">

        <thead>

            <tr>

                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($mahasiswas as $mahasiswa)

            <tr>

                <td>{{ $mahasiswa->nim }}</td>

                <td>{{ $mahasiswa->nama }}</td>

                <td>{{ $mahasiswa->prodi }}</td>

                <td>

                    <a href="/mahasiswa/edit/{{ $mahasiswa->id }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a href="/mahasiswa/delete/{{ $mahasiswa->id }}"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus data?')">

                        Hapus

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4"
                    class="text-center">

                    Belum ada data mahasiswa

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>


</div>

@endsection
