<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login &mdash; {{ env('APP_NAME') ?? 'APP STD' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo text-center">
            <a href="#"><img src="{{ asset('assets') }}/img/logo_std-removebg.png" alt="AdminLTE Logo" class="brand-image" height="50%" width="50%"></a>
            {{-- <h4><a href="#"><b>PT.</b> Sinar Timur Darmawan</a></h4> --}}
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login untuk masuk aplikasi</p>

                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email_username" class="form-control" placeholder="Username/Email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="fas fa-sign-in-alt mr-2"></i>
                                Login</button>
                        </div>
                    </div>
                </form>

                {{-- <div class="text-center mt-3">
                    <p class="mb-1">
                        <a href="forgot-password.html">Lupa password...</a>
                    </p>
                </div> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>

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
</body>

</html>
