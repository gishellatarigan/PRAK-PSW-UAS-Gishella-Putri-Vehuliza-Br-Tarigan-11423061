<!DOCTYPE html>
<html>
<head>
    <title>Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-size: 0.875rem;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Booking Page</h1>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <div class="card-body">
                            <table id="table_id" class="dataTable table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama </th>
                                        <th>Lapangan</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admin as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->Nama }}</td>
                                            <td>{{ $user->Lapangan }}</a></td>
                                            <td>{{ $user->lokasi }}</td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                                <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
                                        <h5 class="modal-title" id="locationModalLabel">Tambah Pengelola</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="pengelolaForm" method="POST" action="#">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_pengelola">Nama Pemesan:</label>
                                                <input type="text" class="form-control" id="nama_pemesan" name="namaPemesan" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lapangan">Lapangan:</label>
                                                <input type="text" class="form-control" id="lapangan" name="lapangan" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi">Lokasi:</label>
                                                <select class="form-control" id="lokasi" name="lokasi" required>
                                                    @foreach($lokasi as $lok)
                                                        <option value="{{ $lok->id }}">{{ $lok->namaLokasi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
