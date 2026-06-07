<!DOCTYPE html>
<html>
<head>

    <title>Login Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <h2>Login Mahasiswa</h2>

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    <form method="POST">

        @csrf

        <div class="mb-3">

            <label>NIM</label>

            <input
                type="text"
                name="nim"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input
                type="password"
                name="password"
                class="form-control">

        </div>

        <button
            class="btn btn-primary">

            Login

        </button>

    </form>

</div>

</body>
</html>
