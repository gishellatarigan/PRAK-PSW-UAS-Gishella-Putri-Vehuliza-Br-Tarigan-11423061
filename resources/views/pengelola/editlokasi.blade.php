<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
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
                <a class="nav-link" href="{{ route('pengelola.lapangan.index') }}">Lapangan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Rekapitulasi</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-4">Edit Lokasi</h1>
                    <p>Edit lokasi dibawah ini</p>
                    <br>
                    @if(Session::has('success'))
                    <div class="alert alert-success mt-3">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengelola.lokasi.update', $lokasi->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_lokasi">Nama Lokasi:</label>
                                <input type="text" class="form-control" id="nama_lokasi" name="namaLokasi" value="{{ $lokasi->namaLokasi }}" required>
                            </div>
                            @error('namaLokasi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
</body>
</html>
