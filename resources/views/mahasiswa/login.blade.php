<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Presensi Wajah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(
                135deg,
                #0f172a,
                #1e3a8a,
                #2563eb
            );
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,.15);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            font-size: 35px;
        }

        .logo h3 {
            margin-top: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        .logo p {
            color: #64748b;
            margin-bottom: 0;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-login {
            background: #2563eb;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .alert-custom {
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="logo">

            <div class="logo-icon">
                <i class="bi bi-person-bounding-box"></i>
            </div>

            <h3>Presensi Wajah</h3>

            <p>
                Sistem Presensi Mahasiswa
            </p>

        </div>

        @if (session('error'))
            <div class="alert-custom">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Username / NIM
                </label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Masukkan Username atau NIM"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan Password"
                    required>
            </div>

            <button type="submit" class="btn btn-primary btn-login w-100">
                <i class="bi bi-box-arrow-in-right"></i>
                Login
            </button>

        </form>

    </div>

</body>

</html>

