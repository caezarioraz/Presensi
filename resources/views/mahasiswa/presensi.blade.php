@extends('layouts.mahasiswa')

@section('content')
    <h2>Presensi Mahasiswa</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <video id="video" width="500" autoplay class="border">
    </video>

    <br><br>

    <button type="button" id="capture" class="btn btn-primary">

        Ambil Foto

    </button>

    <form id="formPresensi" action="/mahasiswa/presensi" method="POST">

        @csrf

        <input type="hidden" name="image" id="imageInput">

    </form>

    <canvas id="canvas" style="display:none;">
    </canvas>

    <script>
        navigator.mediaDevices
            .getUserMedia({
                video: true
            })
            .then(function(stream) {

                document
                    .getElementById('video')
                    .srcObject = stream;

            });

        document
            .getElementById('capture')
            .addEventListener(
                'click',
                function() {

                    let video =
                        document.getElementById('video');

                    let canvas =
                        document.getElementById('canvas');

                    if (video.videoWidth === 0) {

                        alert('Kamera belum siap');
                        return;
                    }

                    canvas.width =
                        video.videoWidth;

                    canvas.height =
                        video.videoHeight;

                    canvas
                        .getContext('2d')
                        .drawImage(
                            video,
                            0,
                            0
                        );

                    let image =
                        canvas.toDataURL('image/png');

                    document
                        .getElementById('imageInput')
                        .value = image;

                    document
                        .getElementById('formPresensi')
                        .submit();
                });
    </script>
@endsection
