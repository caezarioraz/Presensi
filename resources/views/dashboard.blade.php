@extends('layouts.app')

@section('content')
    <h2>Dashboard Admin</h2>

    <div class="row mt-4">

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Total Mahasiswa</h5>

                    <h2>
                        {{ $totalMahasiswa }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Total Presensi</h5>

                    <h2>
                        {{ $totalPresensi }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Presensi Hari Ini</h5>

                    <h2>
                        {{ $presensiHariIni }}
                    </h2>

                </div>

            </div>

        </div>

    </div>
@endsection
