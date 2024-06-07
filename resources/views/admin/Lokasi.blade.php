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
            <a class="navbar-brand" href="#">Dashboard Lokasi</a>
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
                                        <a href="{{ route('admin.lokasi.edit', $lok->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('admin.lokasi.destroy', $lok->id) }}" method="POST" style="display:inline-block;">
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
                                    <form id="locationForm" method="POST" action="{{ route('admin.lokasi.store') }}">
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
