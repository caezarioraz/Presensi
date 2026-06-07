@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">


<div>

    <h2 class="fw-bold mb-0">
        Data Wajah
    </h2>

    <p class="text-muted mb-0">
        Daftar wajah mahasiswa yang sudah terdaftar
    </p>

</div>

<a href="/face-master/create" class="btn btn-primary">

    <i class="bi bi-plus-circle"></i>
    Registrasi Wajah

</a>


</div>

<div class="card border-0 shadow-sm">


<div class="card-body">

    <table class="table table-hover align-middle">

        <thead>

            <tr>
                <th>ID</th>
                <th>Mahasiswa</th>
                <th>Foto</th>
            </tr>

        </thead>

        <tbody>

            @forelse($faces as $face)

            <tr>

                <td>{{ $face->id }}</td>

                <td>
                    {{ $face->mahasiswa->nama ?? '-' }}
                </td>

                <td>

                    <img src="{{ asset('storage/' . $face->foto) }}"
                         width="80"
                         class="rounded shadow-sm">

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3" class="text-center text-muted">
                    Belum ada data wajah
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>


</div>

@endsection
