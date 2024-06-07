<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sewa Lapangan Badminton</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    .vh-100 {
      height: 100vh;
    }

    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 2rem;
    }

    .form-outline {
      position: relative;
      margin-bottom: 1.5rem;
    }

    .form-control {
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 0.5rem;
      font-size: 1rem;
    }

    .form-label {
      position: absolute;
      top: -0.8rem;
      left: 1rem;
      background: #fff;
      padding: 0 0.5rem;
      color: #666;
      font-size: 0.85rem;
    }

    .btn-primary {
      background: #2575fc;
      border: none;
      padding: 0.75rem 1.5rem;
      font-size: 1.1rem;
      border-radius: 0.5rem;
      transition: background 0.3s;
    }

    .btn-primary:hover {
      background: #1e63d3;
    }

    .alert {
      margin-top: 1rem;
      border-radius: 0.5rem;
    }

    .my-4 {
      margin: 2rem 0;
    }

    a {
      color: #2575fc;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <section class="vh-100" style="background-color: #fadacb;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-5">Login Sebagai Admin</h3>

              <form action="{{ url('/admin/login') }}" method="POST">
                @csrf
                @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error: </strong> {{ Session::get('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <div class="form-outline mb-4">
                  <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                  <label class="form-label" for="username">Username</label>
                </div>
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                  <label class="form-label" for="password">Password</label>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </form>

              <hr class="my-4">

              <a href="/">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
