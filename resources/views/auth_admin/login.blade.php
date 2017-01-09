<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicio de sesión - Administración</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/admin-assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/admin-assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/admin-assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/admin-assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">JobFor<b>Us</b></a>
        <small>Administración</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{route('admin.login')}}">
                {{ csrf_field() }}
                <div class="msg">Ingrese sus credenciales</div>

                @if ($errors->has('username'))
                    <div class="alert alert-info">
                        {{ $errors->first('username') }}
                    </div>
                @endif

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-pink">
                        <label for="remember">Recordar</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">INGRESAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/admin-assets/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="/admin-assets/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="/admin-assets/js/admin.js"></script>
<script src="/admin-assets/js/pages/examples/sign-in.js"></script>
</body>

</html>