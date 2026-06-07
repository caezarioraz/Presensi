@extends('layouts.app')

@section('content')

<div class="mb-4">


<h2 class="fw-bold">
    Registrasi Wajah
</h2>

<p class="text-muted">
    Pilih mahasiswa dan upload foto wajah
</p>

</div>

<div class="card border-0 shadow-sm">


<div class="card-body">

    <form action="/face-master/store"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Mahasiswa
            </label>

            <select name="mahasiswa_id"
                    class="form-select">

                @foreach($mahasiswas as $m)

                    <option value="{{ $m->id }}">
                        {{ $m->nim }} - {{ $m->nama }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Foto Wajah
            </label>

            <input type="file"
                   name="foto"
                   class="form-control"
                   accept="image/*"
                   required>

        </div>

        <button class="btn btn-success">

            <i class="bi bi-save"></i>
            Simpan

        </button>

        <a href="/face-master"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

@endsection
