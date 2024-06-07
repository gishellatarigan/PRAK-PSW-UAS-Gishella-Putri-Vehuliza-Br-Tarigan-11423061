<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand text-brand">USER</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.booking.index') }}">Daftar Booking</a>
      </li>        
        <li class="nav-item">
          <a class="nav-link" href="#">Daftar Member</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Daftar Lapangan</a>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/pengelola/logout">Logout</a>
            </li>
        </ul>
    </div>
    </div>
  </div>
</nav>
