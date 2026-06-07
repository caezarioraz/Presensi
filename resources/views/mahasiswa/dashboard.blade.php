@extends('layouts.mahasiswa')

@section('content')

<h2>Dashboard Mahasiswa</h2>

<div class="alert alert-success">

    Selamat datang,

    {{ session('mahasiswa_nama') }}

</div>

@endsection
