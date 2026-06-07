<!DOCTYPE html>
<html>

<head>
    <title>Presensi Wajah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            min-height: 100vh;
            background: #212529;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
        }

        .sidebar a:hover {
            background: #343a40;
        }
    </style>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!-- Sidebar -->

            <div class="col-md-2 sidebar">

                <h4 class="text-white p-3">
                    Presensi
                </h4>

                <a href="/dashboard">
                    Dashboard
                </a>

                <a href="/mahasiswa">
                    Mahasiswa
                </a>

                <a href="/face-master">
                    Data Wajah
                </a>

                <a href="/jadwal">
                    Jadwal
                </a>

                <a href="/presensi">
                    Presensi
                </a>

                <a href="/laporan">
                    Laporan
                </a>

                <a href="/logout">
                    Logout
                </a>

            </div>

            <!-- Content -->

            <div class="col-md-10">

                <nav class="navbar navbar-light bg-light">

                    <div class="container-fluid">

                        <span>
                            Halo,
                            {{ session('admin_username') }}
                        </span>

                    </div>

                </nav>

                <div class="p-4">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>

</body>

</html>
