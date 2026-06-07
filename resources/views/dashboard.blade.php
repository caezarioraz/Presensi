@extends('layouts.app')

@section('content')

<div class="mb-4">

<h2 class="fw-bold">
    Dashboard Admin
</h2>

<p class="text-muted">
    Sistem Presensi Mahasiswa Berbasis Face Recognition
</p>


</div>

<div class="row">


<div class="col-md-4 mb-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between">

                <div>

                    <h6 class="text-muted">
                        Total Mahasiswa
                    </h6>

                    <h2 class="fw-bold">
                        {{ $totalMahasiswa }}
                    </h2>

                </div>

                <div class="fs-1 text-primary">
                    <i class="bi bi-people-fill"></i>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="col-md-4 mb-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between">

                <div>

                    <h6 class="text-muted">
                        Total Presensi
                    </h6>

                    <h2 class="fw-bold">
                        {{ $totalPresensi }}
                    </h2>

                </div>

                <div class="fs-1 text-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="col-md-4 mb-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between">

                <div>

                    <h6 class="text-muted">
                        Presensi Hari Ini
                    </h6>

                    <h2 class="fw-bold">
                        {{ $presensiHariIni }}
                    </h2>

                </div>

                <div class="fs-1 text-warning">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>

            </div>

        </div>

    </div>

</div>


</div>

<div class="card border-0 shadow-sm">


<div class="card-body">

    <h5 class="fw-bold mb-3">
        Informasi Sistem
    </h5>

    <ul>

        <li>
            Presensi menggunakan Face Recognition
        </li>

        <li>
            Verifikasi wajah dilakukan oleh Python Flask API
        </li>

        <li>
            Data presensi tersimpan otomatis ke database
        </li>

        <li>
            Presensi ganda dalam satu hari tidak diperbolehkan
        </li>

    </ul>

</div>


</div>

@endsection
