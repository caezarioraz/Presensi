@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-4">
    Tambah Admin
</h2>

<div class="card border-0 shadow-sm">


<div class="card-body">

    <form action="/admin/store" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Username
            </label>

            <input
                type="text"
                name="username"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                required>

        </div>

        <button
            type="submit"
            class="btn btn-primary">

            Simpan

        </button>

        <a href="/admin"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>


</div>

@endsection
