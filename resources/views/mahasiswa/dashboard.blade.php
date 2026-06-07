@extends('layouts.mahasiswa')

@section('content')

<div class="alert alert-success border-0 shadow-sm">


<h4 class="mb-2">
    Selamat Datang,
    {{ session('mahasiswa_nama') }}
</h4>

<p class="mb-0">
    Sistem Presensi Mahasiswa Berbasis Face Recognition
</p>


</div>

<div class="row">


<div class="col-md-4 mb-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h6 class="text-muted">
                Total Presensi
            </h6>

            <h1 class="fw-bold text-primary">
                {{ $totalPresensi ?? 0 }}
            </h1>

        </div>

    </div>

</div>

<div class="col-md-4 mb-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h6 class="text-muted">
                Status Wajah
            </h6>

            @if(isset($face) && $face)

                <span class="badge bg-success fs-6">
                    Sudah Terdaftar
                </span>

            @else

                <span class="badge bg-danger fs-6">
                    Belum Terdaftar
                </span>

            @endif

        </div>

    </div>

</div>

<div class="col-md-4 mb-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h6 class="text-muted">
                NIM
            </h6>

            <h4 class="fw-bold">
                {{ session('mahasiswa_nim') }}
            </h4>

        </div>

    </div>

</div>


</div>

@endsection
