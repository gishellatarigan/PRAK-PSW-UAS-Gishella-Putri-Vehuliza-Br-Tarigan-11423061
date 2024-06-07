<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penetapan Pengelola</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar h4 {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: #fff;
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
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .navbar-nav .nav-item .nav-link {
            color: #212529;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #007bff;
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
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/pengelola/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-4">Penetapan Pengelola</h1>
                    <form action="{{ route('admin.pengelola.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="member">Nama Pengelola</label>
                            <select class="form-control" id="member" name="member_id">
                                @foreach($members as $member) 
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" id="lokasi" name="lokasi_id">
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi->id }}">{{ $lokasi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Tetapkan Pengelola</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
