@extends('layouts.app')

@section('content')

<div class="mb-4">

```
<h2 class="fw-bold">
    Presensi Wajah
</h2>

<p class="text-muted">
    Upload foto untuk verifikasi wajah
</p>
```

</div>

<div class="card border-0 shadow-sm">

```
<div class="card-body">

    <form action="{{ route('presensi.verify') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Upload Foto
            </label>

            <input type="file"
                   name="foto"
                   class="form-control"
                   accept="image/*"
                   required>

        </div>

        <button class="btn btn-primary">

            <i class="bi bi-check-circle-fill"></i>
            Verifikasi

        </button>

    </form>

</div>
```

</div>

@if(session('success'))

<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

@if(session('error'))

<div class="alert alert-danger mt-3">
    {{ session('error') }}
</div>
@endif

@endsection
