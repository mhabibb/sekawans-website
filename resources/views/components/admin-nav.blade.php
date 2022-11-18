<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item d-sm-inline-block">
      <a href="/" target="blank" class="nav-link">Beranda</a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('logos/ms-icon-144x144.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Sekawan'S</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="user-panel nav-item pb-1">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              {{ Auth::user()->name }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-danger" id="btn_logout">
                <i class="far fa-circle nav-icon"></i>
                <p>Logout</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.sekawans.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Tentang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.infotbc.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle-info"></i>
            <p>
              Informasi TBC
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.patients.index') }}" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Data Pasien TBC
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.articles.index')}}" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Artikel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.kegiatan.index')}}" class="nav-link">
            <i class="nav-icon fas fa-square-person-confined"></i>
            <p>
              Kegiatan
            </p>
          </a>
        </li>
        <li class="nav-header">SUPER ADMIN</li>
        <li class="nav-item">
          <a href="{{route('admin.users.index')}}" class="nav-link">
            <i class="nav-icon fas fa-lock"></i>
            <p>
              Kelola Akun
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-waveform"></i>
            <p>
              Log Aktivitas
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>