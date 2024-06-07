<!DOCTYPE html>
<html>
<head>
    <title>Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            margin-top: 50px;
        }
        .content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            color: #0079a8;
            text-align: center;
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-secondary {
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover, .btn-secondary:hover {
            opacity: 0.9;
        }
        .dataTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .dataTable th, .dataTable td {
            border: 1px solid #dee2e6;
            padding: 12px;
        }
        .dataTable th {
            background-color: #007bff;
            color: #000000;
            text-align: center;
            font-weight: bold;
        }
        .dataTable td {
            text-align: center;
        }
        .modal-content {
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .modal-title {
            color: #007bff;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
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
                            <h1><u>BOOKING PAGE</u></h1>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#locationModal" onclick="clearForm()">Add Pesanan</button>
                            <button type="button" class="btn btn-secondary mb-3 ml-2" onclick="redirectToDashboard()">Selesai</button>
                            <table id="table_id" class="dataTable table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Lapangan</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <!-- Initially empty; will be populated dynamically -->
                                </tbody>
                            </table>
                        </div>
    
                        <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="locationModalLabel">Tambah Pesanan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="pengelolaForm" method="POST" action="/">
                                            @csrf
                                            <input type="hidden" id="editIndex" name="editIndex" value="-1">
                                            <div class="form-group">
                                                <label for="nama_pemesan">Nama Pemesan:</label>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="submitForm()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        let currentEditIndex = -1;

        function submitForm() {
            var namaPemesan = document.getElementById('nama_pemesan').value;
            var lapangan = document.getElementById('lapangan').value;
            var lokasi = document.getElementById('lokasi').options[document.getElementById('lokasi').selectedIndex].text;
            
            var tableBody = document.getElementById('tableBody');
            
            if (currentEditIndex === -1) {
                var rowCount = tableBody.rows.length;
                var newRow = tableBody.insertRow(rowCount);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                var cell5 = newRow.insertCell(4);

                cell1.innerHTML = rowCount + 1;
                cell2.innerHTML = namaPemesan;
                cell3.innerHTML = lapangan;
                cell4.innerHTML = lokasi;
                cell5.innerHTML = `<a href="javascript:void(0)" class="btn btn-info btn-sm" onclick="editRow(${rowCount})">Edit</a>`;
            } else {
                var row = tableBody.rows[currentEditIndex];
                row.cells[1].innerHTML = namaPemesan;
                row.cells[2].innerHTML = lapangan;
                row.cells[3].innerHTML = lokasi;
                currentEditIndex = -1;
            }
            document.getElementById('pengelolaForm').reset();

            $('#locationModal').modal('hide');
        }

        function editRow(index) {
            var tableBody = document.getElementById('tableBody');
            var row = tableBody.rows[index];
            document.getElementById('nama_pemesan').value = row.cells[1].innerHTML;
            document.getElementById('lapangan').value = row.cells[2].innerHTML;
            document.getElementById('lokasi').value = row.cells[3].innerHTML;
            currentEditIndex = index;

            $('#locationModal').modal('show');
        }

        function clearForm() {
            document.getElementById('pengelolaForm').reset();
            currentEditIndex = -1;
        }

        function redirectToDashboard() {
            window.location.href = "http://127.0.0.1:8000/user/dashboard";
        }
    </script>
</body>
</html>
