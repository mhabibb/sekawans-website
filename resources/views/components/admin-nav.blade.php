<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-sm-inline-block">
      <a href="{{ route('beranda') }}" target="blank" class="nav-link">Beranda</a>
    </li>
  </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="{{ asset('logos/ms-icon-144x144.png') }}" alt="..." class="brand-image img-circle elevation-3"
      style="opacity: .9">
    <span class="brand-text font-weight-light">Admin Sekawan'S</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="user-panel nav-item pb-1 mb-1">
          <a href="#" class="nav-link d-flex align-items-center">
            <i class="nav-icon fas fa-user"></i>
            <span class="d-inline-block text-truncate" style="max-width: 150px;">
              {{ Auth::user()->name }}
            </span>
            <i class="right fas fa-angle-left"></i>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.show', Auth::user()) }}" class="nav-link">
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

        @foreach ($navLinks as $route => [$name, $icon])
        <li class="nav-item">
          <a href="{{ route($route.'.index') }}" class="nav-link {{ request()->routeIs($route.'*') ? ' active' : '' }}">
            <i class="nav-icon {{ $icon }}"></i>
            <p>
              {{ $name }}
            </p>
          </a>
        </li>
        @endforeach

        @can('superAdmin')
        <li class="nav-header">SUPER ADMIN</li>
        <li class="nav-item">
          <a href="{{route('admin.users.index')}}"
            class="nav-link {{ request()->routeIs('admin.users.index*') ? ' active' : '' }}">
            <i class="nav-icon fas fa-lock"></i>
            <p>
              Kelola Akun
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.logs.index') }}"
            class="nav-link {{ request()->routeIs('admin.logs.index*') ? ' active' : '' }}">
            <i class="nav-icon fas fa-file-waveform"></i>
            <p>
              Log Aktivitas
            </p>
          </a>
        </li>
        @endcan

      </ul>
    </nav>
  </div>

</aside>