<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Восстановить пароль</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('/') }}assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('/') }}assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('/') }}assets/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>LTE
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Вы забыли свой пароль? Здесь вы можете легко запросить новый пароль.</p>

            <form action="{{ route('admin.auth.passwords.email') }}" method="post">
                @csrf

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           autofocus/>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Запросить новый пароль</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('admin.auth.login') }}">Войти</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ URL::asset('/') }}assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('/') }}assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('/') }}assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
