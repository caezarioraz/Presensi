@extends('layouts.app')

@section('content')

<h2>Data Presensi</h2>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Tanggal</th>
            <th>Jam</th>
            <th>Mahasiswa</th>
            <th>Status</th>
            <th>Distance</th>

        </tr>

    </thead>

    <tbody>

        @foreach($presensis as $p)

        <tr>

            <td>{{ $p->tanggal }}</td>

            <td>{{ $p->jam_masuk }}</td>

            <td>{{ $p->mahasiswa->nama }}</td>

            <td>{{ $p->status }}</td>

            <td>{{ $p->distance }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection