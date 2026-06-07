<!DOCTYPE html>

<html>

<head>


<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    body {
        background: #f5f7fb;
        font-family: 'Poppins', sans-serif;
    }

    .login-box {
        width: 400px;
        margin: 100px auto;
    }

</style>


</head>

<body>

<div class="login-box">


<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <h3 class="text-center mb-4">
            Login Sistem
        </h3>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Username / NIM
                </label>

                <input type="text"
                       name="username"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-primary w-100">

                Login

            </button>

        </form>

    </div>

</div>


</div>

</body>
</html>
