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
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.6;
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
        }
        .sidebar h4 {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .container-fluid {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-center">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.lokasi.index') }}">Lokasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Daftar Booking</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.member.index') }}">Member</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.lapangan.index') }}">Lapangan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.rekapitulasi.index') }}">Rekapitulasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengelola.index') }}">Pengelola</a>
            </li>            
        </ul>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Dashboard Member</a>
        </nav>
        <h1 class="mt-4">Daftar Member</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('admin.member.create') }}" class="btn btn-primary mb-3">Tambah Member</a>
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
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->address }}</td>
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
