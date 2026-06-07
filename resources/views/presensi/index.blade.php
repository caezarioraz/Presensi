@extends('layouts.app')

@section('content')
    <h2>Presensi Wajah</h2>

    <form action="{{ route('presensi.verify') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="foto" class="form-control" accept="image/*" required>

        <button type="submit" class="btn btn-primary mt-2">
            Verifikasi
        </button>
    </form>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
@endsection
