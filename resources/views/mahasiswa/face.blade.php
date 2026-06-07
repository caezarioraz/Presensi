@extends('layouts.mahasiswa')

@section('content')
    <h3>Registrasi Wajah</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($face)
        <div class="alert alert-info">
            Wajah sudah terdaftar.
            Ambil foto baru untuk memperbarui data wajah.
        </div>
    @endif

    <video id="video" width="500" autoplay></video>

    <br><br>

    <button type="button" id="capture" class="btn btn-primary">
        Ambil Foto
    </button>

    <form id="formFace" action="/mahasiswa/face/store" method="POST">
        @csrf

        <input type="hidden" name="image" id="imageInput">
    </form>

    <canvas id="canvas" style="display:none;"></canvas>

    <script>
        navigator.mediaDevices
            .getUserMedia({
                video: true
            })
            .then(function(stream) {
                document.getElementById('video').srcObject = stream;
            })
            .catch(function(error) {

                console.log(error);

                alert(
                    'Kamera tidak dapat diakses'
                );

            });

        document
            .getElementById('capture')
            .addEventListener('click', function() {

                let video = document.getElementById('video');
                let canvas = document.getElementById('canvas');

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                canvas
                    .getContext('2d')
                    .drawImage(video, 0, 0);

                let image = canvas.toDataURL('image/png');

                document.getElementById('imageInput').value = image;

                document.getElementById('formFace').submit();
            });
    </script>
@endsection
