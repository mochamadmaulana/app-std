<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? '' }} &mdash; {{ env('APP_NAME') ?? 'APP STD' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.css">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <h4 class="brand-text font-weight-light">APP - <b>STD</b></h4>
            {{-- <img class="animation__shake" src="{{ asset('assets') }}/img/logo_std-removebg.png" alt="AdminLTELogo" height="60" width="60"> --}}
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar bg-white navbar-expand">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: black"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span class="d-none d-md-inline mr-2" style="color: black">{{ Auth::user()->nama_lengkap ?? 'Nama Lengkap'}}</span>
                        <img src="{{ asset('assets') }}/img/avatar/{{ Auth::user()->avatar }}" class="user-image img-circle elevation-2" alt="User Image">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-secondary">
                        <img src="{{ asset('assets') }}/img/avatar/{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">

                        <p>
                            {{ Auth::user()->nama_lengkap ?? 'Nama Lengkap'}}
                            <small>{{ Auth::user()->jabatan_pegawai->nama ?? 'Jabatan' }}</small>
                        </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-sm btn-success btn-flat shadow-sm"><i class="fas fa-user"></i> Profile</a>
                            <a href="{{ route('logout') }}" class="btn btn-sm btn-danger btn-flat float-right shadow-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">
                <img src="{{ asset('assets') }}/img/logo_std-removebg.png" alt="AdminLTE Logo" class="brand-image" >
                <span class="brand-text font-weight-dark">APP - <b>STD</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('beranda.index') }}" class="nav-link {{ Request::is('beranda') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>

                        <li class="nav-header">Menu</li>

                        <li class="nav-item {{ Request::is('data-master*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('data-master*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-server"></i>
                                <p>Data Master <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- <a href="{{ route('data-master.jabatan-pegawai.index') }}" class="nav-link {{ Request::is('data-master/jabatan-pegawai*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Jabatan Pegawai</p>
                                    </a> --}}
                                    <a href="{{ route('data-master.kategori-produk.index') }}" class="nav-link {{ Request::is('data-master/kategori-produk*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Kategori Produk</p>
                                    </a>
                                    <a href="{{ route('data-master.satuan-produk.index') }}" class="nav-link {{ Request::is('data-master/satuan-produk*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Satuan Produk</p>
                                    </a>
                                    <a href="{{ route('data-master.termin.index') }}" class="nav-link {{ Request::is('data-master/termin*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Termin</p>
                                    </a>

                                    <a href="{{ route('data-master.bank.index') }}" class="nav-link {{ Request::is('data-master/bank*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Bank</p>
                                    </a>
                                    <a href="{{ route('data-master.role.index') }}" class="nav-link {{ Request::is('data-master/role*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Role</p>
                                    </a>
                                    <a href="{{ route('data-master.akses.index') }}" class="nav-link {{ Request::is('data-master/skses*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Akses</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pembelian.index') }}" class="nav-link {{ Request::is('pembelian*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Pembelian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pemasok.index') }}" class="nav-link {{ Request::is('pemasok*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-store-alt"></i>
                                <p>Pemasok</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}" class="nav-link {{ Request::is('produk*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>Produk</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('rekening-bank.index') }}" class="nav-link {{ Request::is('rekening-bank*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-credit-card"></i>
                                <p>Rekening Bank</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pegawai.index') }}" class="nav-link {{ Request::is('pegawai*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('pengaturan*') ? 'menu-open' : '' }} mb-5">
                            <a href="#" class="nav-link {{ Request::is('pengaturan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Pengaturan <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{ Request::is('pengaturan/profil*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Profile</p>
                                    </a>
                                    <a href="{{ route('pengaturan.role-akses.index') }}" class="nav-link {{ Request::is('pengaturan/role-akses*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Role Akses</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 | <a href="#"><b>PT. </b>Sinar Timur Darmawan</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @stack('modal')

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Toastr -->
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>

    @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}')
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}')
            });
        </script>
    @endif

    @stack('js')
</body>
