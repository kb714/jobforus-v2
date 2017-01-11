<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Administración - {{config('app.name')}}</title>
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

    <!-- Bootstrap Select Css -->
    <link href="/admin-assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/admin-assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/admin-assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-purple">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p> Cargando ...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('admin.index')}}">Administración - {{config('app.name')}}</a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::guard('admin')->user()->name}}
                </div>
                <div class="email">{{Auth::guard('admin')->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('admin-profile.index')}}"><i class="material-icons">person</i>Perfil</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Desconectar</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Navegación</li>
                <li>
                    <a href="{{route('admin.index')}}">
                        <i class="material-icons">home</i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('job-types.index')}}">
                        <i class="material-icons">work</i>
                        <span>Tipos de trabajo</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('memberships.index')}}">
                        <i class="material-icons">card_membership</i>
                        <span>Membresías (pagos)</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin-users.index')}}">
                        <i class="material-icons">group</i>
                        <span>Administradores</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users.index')}}">
                        <i class="material-icons">face</i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('cover-letters.index')}}">
                        <i class="material-icons">mail</i>
                        <span>Cartas de presentación</span>
                    </a>
                </li>
                <li class="header">Contenido</li>
                <li>
                    <a href="{{route('pages.index')}}">
                        <i class="material-icons">pages</i>
                        <span>Páginas de contenido</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 <a href="javascript:void(0);">JobForUs</a>.
            </div>
            <div class="version">
                <b>Version: </b> {{App::VERSION()}} (laravel)
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            @yield('content')
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.js"></script>

<script src="https://unpkg.com/vue/dist/vue.js"></script>

<!-- Select Plugin Js -->
<script src="/admin-assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="/admin-assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Ckeditor -->
<script src="/admin-assets/plugins/ckeditor/ckeditor.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/admin-assets/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="/admin-assets/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="/admin-assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="/admin-assets/js/admin.js"></script>
<script src="/admin-assets/js/pages/forms/editors.js"></script>
<script src="/admin-assets/js/pages/widgets/infobox/infobox-2.js"></script>

<!-- Demo Js -->
<script src="/admin-assets/js/demo.js"></script>
</body>

</html>