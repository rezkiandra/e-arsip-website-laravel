<!DOCTYPE html>
<html dir="ltr" lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>@yield('title')</title>
    @stack('styles')
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
  </head>

  <body>
    @include('sweetalert::alert')
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    @if (Auth::check())
      <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
          <nav class="navbar top-navbar navbar-expand-lg">
            <div class="navbar-header" data-logobg="skin6">
              <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                  class="ti-menu ti-close"></i></a>
              <div class="navbar-brand">
                <a href="index.html">
                  <img src="{{ asset('assets/images/freedashDark.svg') }}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
              <ul class="navbar-nav float-left me-auto ms-3 ps-1"></ul>
              <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span>
                      <span class="text-dark text-capitalize">{{ Auth::user()->name }}</span>
                      <i data-feather="chevron-down" class="svg-icon"></i>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                      <i data-feather="power" class="svg-icon me-2 ms-1"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
          <div class="scroll-sidebar" data-sidebarbg="skin6">
            <nav class="sidebar-nav">
              <ul id="sidebarnav">
                <li class="sidebar-item">
                  <a class="sidebar-link sidebar-link" href="{{ route('admin.dashboard') }}"
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}>
                    <i data-feather="home" class="feather-icon"></i>
                    <span class="hide-menu">Dashboard</span>
                  </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Manajemen Data</span></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    {{ request()->routeIs('admin.website.*') ? 'active' : '' }}>
                    <i data-feather="globe" class="feather-icon"></i>
                    <span class="hide-menu">Website</span>
                  </a>
                  <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item">
                      <a href="{{ route('admin.website') }}" class="sidebar-link"
                        {{ request()->routeIs('admin.website') ? 'active' : '' }}>
                        <span class="hide-menu">
                          Daftar Website
                        </span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                      <a href="{{ route('admin.website.add') }}" class="sidebar-link"
                        {{ request()->routeIs('admin.website.add') ? 'active' : '' }}>
                        <span class="hide-menu">
                          Tambah Website
                        </span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </aside>

        <div class="page-wrapper">
          @yield('content')

          <footer class="footer text-center text-muted border-top">
            <div class="d-flex justify-content-between">
              <span>Copyrights &copy 2024 <span class="text-primary fw-medium">E-ARSIP</span>. All rights
                reserved.</span>
              <span>Anything</span>
            </div>
          </footer>
        </div>
      </div>
    @else
      <div id="main-wrapper">
        <div class="page-wrapper">
          @yield('content')
        </div>
        <footer class="footer text-center text-muted border-top">
          <marquee behavior="scroll" direction="right-to-left">
            Selamat Datang Di Kumpulan Website
          </marquee>
        </footer>
      </div>
    @endif
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.min.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    @stack('scripts')
    {{-- <script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.css') }}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/chartist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
  </body>

</html>
