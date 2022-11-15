<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" aria-label="Offcanvas navbar large">
    <div class="container-xl">
        <a class="navbar-brand" href="/">
            <img src="/img/logo-sekawans.png" alt="logo-sekawans.png" width="32" height="32"
                class="d-inline-block align-text-bottom"> <span class="ms-2">Sekawan'S</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
            aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-light" tabindex="-1" id="offcanvasNavbar2"
            aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @foreach ($navLinks as $route => $name)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($route.'*') ? ' active' : '' }}"
                            href="{{route($route)}}">{{$name}}</a>
                    </li>
                    @endforeach
                </ul>
                <form class="d-flex mt-3 mt-lg-0" role="search">
                    <input class="form-control rounded-0 me-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary rounded-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>