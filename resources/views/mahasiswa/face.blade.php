@extends('layouts.mahasiswa')

@section('content')

<div class="mb-4">


<h3 class="fw-bold">
    Registrasi Wajah
</h3>

<p class="text-muted">
    Pastikan wajah terlihat jelas di kamera sebelum mengambil foto
</p>

</div>

@if (session('success'))

<div class="alert alert-success border-0 shadow-sm">
    {{ session('success') }}
</div>
@endif

@if ($face)

<div class="alert alert-info border-0 shadow-sm">
    <strong>Status:</strong> Wajah sudah terdaftar.
    Anda bisa mengambil ulang jika ingin memperbarui data.
</div>
@endif

<div class="card border-0 shadow-sm">


<div class="card-body text-center">

    <video id="video"
           autoplay
           class="rounded border"
           style="width: 100%; max-width: 600px;">
    </video>

    <div class="mt-3">

        <button type="button"
                id="capture"
                class="btn btn-primary px-4">

            <i class="bi bi-camera-fill"></i>
            Ambil Foto

        </button>

    </div>

</div>

</div>

<form id="formFace"
      action="/mahasiswa/face/store"
      method="POST">


@csrf

<input type="hidden" name="image" id="imageInput">


</form>

<canvas id="canvas" style="display:none;"></canvas>

<script>
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            document.getElementById('video').srcObject = stream;
        })
        .catch(function(error) {
            alert('Kamera tidak dapat diakses');
            console.log(error);
        });

    document.getElementById('capture').addEventListener('click', function() {

        let video = document.getElementById('video');
        let canvas = document.getElementById('canvas');

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        canvas.getContext('2d').drawImage(video, 0, 0);

        let image = canvas.toDataURL('image/png');

        document.getElementById('imageInput').value = image;

        document.getElementById('formFace').submit();

    });
</script>

@endsection
