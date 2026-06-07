@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-4">
    Edit Mahasiswa
</h2>

<div class="card border-0 shadow-sm">


<div class="card-body">

    <form action="/mahasiswa/update/{{ $mahasiswa->id }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                NIM
            </label>

            <input type="text"
                   name="nim"
                   class="form-control"
                   value="{{ $mahasiswa->nim }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nama Mahasiswa
            </label>

            <input type="text"
                   name="nama"
                   class="form-control"
                   value="{{ $mahasiswa->nama }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Program Studi
            </label>

            <input type="text"
                   name="prodi"
                   class="form-control"
                   value="{{ $mahasiswa->prodi }}"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Update

        </button>

        <a href="/mahasiswa"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>


</div>

@endsection
