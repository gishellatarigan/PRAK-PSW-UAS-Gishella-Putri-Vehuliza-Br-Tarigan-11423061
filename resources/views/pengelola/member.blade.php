<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f5;
            color: #333;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding-top: 20px;
            transition: width 0.3s;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: #34495e;
            padding-left: 25px;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            transition: margin-left 0.3s;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .navbar-brand {
            font-weight: bold;
            color: #2980b9;
        }

        .navbar-nav .nav-item .nav-link {
            color: #2980b9;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #1abc9c;
        }

        h1 {
            color: #2c3e50;
            font-weight: bold;
        }

        p {
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('pengelola.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengelola.lokasi.index') }}">Lokasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengelola.member.index') }}">Member</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengelola.logout') }}">Logout</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('pengelola.index') }}">Pengelola Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengelola.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <h1 class="mt-4">Daftar Member</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('pengelola.member.create') }}" class="btn btn-primary mb-3">Tambah Member</a>
        <table id="memberTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengelola</th>
                    <th>Nomor HP</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengelola as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama_pengelola }}</td>
                        <td>{{ $p->nomor_hp }}</td>
                        <td>{{ $p->username }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#memberTable').DataTable();
        });
    </script>
</body>
</html>