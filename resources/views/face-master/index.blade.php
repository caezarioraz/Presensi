@extends('layouts.app')

@section('content')
    <h2>Data Wajah</h2>

    <a href="/face-master/create" class="btn btn-primary mb-3">

        Registrasi Wajah

    </a>

    <table class="table">

        <tr>

            <th>ID</th>
            <th>Foto</th>

        </tr>

        @foreach ($faces as $face)
            <tr>

                <td>{{ $face->id }}</td>

                <td>

                    <img src="{{ asset('storage/' . $face->foto) }}" width="120">

                </td>

            </tr>
        @endforeach

    </table>
@endsection
