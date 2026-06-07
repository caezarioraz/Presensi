<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Presensi Wajah</title>

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
            background: #f5f7fb;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            position: fixed;
            background: linear-gradient(180deg,#0f172a,#1e293b);
        }

        .logo {
            text-align: center;
            color: white;
            padding: 25px 0;
        }

        .menu-link {
            display: block;
            padding: 14px 20px;
            margin: 6px 12px;
            color: rgba(255,255,255,.8);
            text-decoration: none;
            border-radius: 12px;
            transition: .3s;
        }

        .menu-link:hover {
            background: rgba(255,255,255,.1);
            color: white;
        }

        .main {
            margin-left: 260px;
        }

        .navbar-custom {
            background: white;
            padding: 18px 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,.05);
        }

        .content-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,.05);
        }
    </style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        <i class="bi bi-person-workspace fs-1"></i>
        <h5>Admin Panel</h5>
    </div>

    <a href="/dashboard" class="menu-link">
        <i class="bi bi-grid-fill"></i> Dashboard
    </a>

    <a href="/mahasiswa" class="menu-link">
        <i class="bi bi-people-fill"></i> Mahasiswa
    </a>

    <a href="/admin" class="menu-link">
        <i class="bi bi-person-fill-gear"></i> Admin
    </a>

    <a href="/face-master" class="menu-link">
        <i class="bi bi-camera-fill"></i> Data Wajah
    </a>

    <a href="/presensi/data" class="menu-link">
        <i class="bi bi-check-circle-fill"></i> Data Presensi
    </a>

    <a href="/logout" class="menu-link">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</div>

<div class="main">

    <div class="navbar-custom d-flex justify-content-between">

        <h5 class="mb-0 fw-bold">
            Dashboard Admin
        </h5>

        <span class="badge bg-primary p-2">
            {{ session('admin_username') }}
        </span>

    </div>

    <div class="content-card">
        @yield('content')
    </div>

</div>

</body>
</html>

