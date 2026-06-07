<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Presensi Wajah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: white;
            width: 380px;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo i {
            font-size: 45px;
            color: #0f172a;
        }

        .logo h4 {
            font-weight: 600;
            margin-top: 10px;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 10px 14px;
        }

        .btn-login {
            background: #0f172a;
            color: white;
            border-radius: 12px;
            padding: 10px;
            font-weight: 500;
            transition: .3s;
        }

        .btn-login:hover {
            background: #1e293b;
        }

        .error-box {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 10px;
            font-size: 13px;
            text-align: center;
            margin-bottom: 15px;
        }

        .hint {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">
        <i class="bi bi-person-workspace"></i>
        <h4>Presensi Wajah</h4>
        <small class="text-muted">Login ke sistem</small>
    </div>

    @if(session('error'))
        <div class="error-box">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
        </div>

        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username / NIM" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>
    </form>

    <div class="hint">
        Sistem Presensi Wajah • Admin & Mahasiswa
    </div>

</div>

</body>

</html>