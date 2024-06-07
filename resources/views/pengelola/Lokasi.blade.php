<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengelola Dashboard</title>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('pengelola.index') }}">pengelola Dashboard</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-4">Tambah Lokasi</h1>
                    <p>Tambah lokasi dibawah ini</p>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#locationModal">
                        Tambah
                    </button>
                    <br>
                    @if(Session::has('success'))
                    <div class="alert alert-success mt-3">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="table_id" class="dataTable table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lokasi as $lok)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lok->namaLokasi }}</td>
                                    <td>
                                        <a href="{{ route('pengelola.lokasi.edit', $lok->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('pengelola.lokasi.destroy', $lok->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="locationModalLabel">Tambah Lokasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="locationForm" method="POST" action="{{ route('pengelola.lokasi.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_lokasi">Nama Lokasi:</label>
                                            <input type="text" class="form-control" id="nama_lokasi" name="namaLokasi" required>
                                        </div>
                                        @error('namaLokasi')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });

        function submitForm() {
            document.getElementById('locationForm').submit();
        }
    </script>
</body>
</html>
