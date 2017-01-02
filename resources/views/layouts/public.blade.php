<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobForUs</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div id="app" class="container margin-top-public">
    <div class="row">
        <div class="col-xs-12">
            <div class="social-networks text-right">
                <a href="#"><img src="/images/facebook.png" alt="Facebook Page"></a>
                <a href="#"><img src="/images/twitter.png" alt="Twitter Page"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 text-center">
            <img src="/images/logo.png" alt="Logo JobForUs">
        </div>
        <div class="col-lg-9">
            <ul class="header-nav center-pills nav nav-pills hidden-xs">
                <li class="active"><a href="{{route('home')}}">Inicio</a></li>
                <li><a href="#">Cómo funciona</a></li>
                <li><a href="#">Transparentes</a></li>
                <li><a href="#">Contáctenos</a></li>
                @if(Auth::check())
                    <li><a class="purple" href="{{route('dashboard')}}">
                            Mi cuenta {{Auth::user()->profile->getUserType()}}
                            <span class="badge">{{Auth::user()->membership->plan->name}}</span></a>
                    </li>
                    <li><a class="purple" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Desconectar</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li><a class="purple" href="{{route('login')}}">Login</a></li>
                    <li><a class="purple" href="{{route('register')}}">Registro</a></li>
                @endif
            </ul>
            <div class="dropdown visible-xs menu-responsive full-width-dropdown">
                <button class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                    Navegación
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="active"><a href="{{route('home')}}">Inicio</a></li>
                    <li><a href="#">Cómo funciona</a></li>
                    <li><a href="#">Transparentes</a></li>
                    <li><a href="#">Contáctenos</a></li>
                    <li><a class="purple" href="{{route('login')}}">Login</a></li>
                    <li><a class="purple" href="{{route('register')}}">Registro</a></li>
                </ul>
                <hr>
            </div>
        </div>
    </div>
</div>
@if(isset($slider))
    <div id="slider-container">
        <div id="jobforus-slider" class="center-block carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/images/slider/01.png" alt="Slider 1">
                    <div class="carousel-caption">
                        <div class="title">
                            Te necesitan. Te buscan. <b>Te encuentran.</b>
                        </div>
                        <div class="form">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="¿A quién buscas? Ingresa aquí tu(s) palabra(s) o frase(s) idóneas">
                                </div>
                                <button type="submit" class="btn btn-default"><b>Encontrar</b></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="/images/slider/02.png" alt="Slider 2">
                    <div class="carousel-caption">
                        <div class="title">
                            <b>"ESE"</b> trabajo te está buscando.<br>
                            Ayúdalo a <b>encontrarte</b>.
                        </div>
                        <div class="form">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Cargo o área profesional">
                                </div>
                                <button type="submit" class="btn btn-default"><b>Encontrar</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls
            <a class="left carousel-control" href="#jobforus-slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#jobforus-slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Posterior</span>
            </a>
            -->
        </div>
    </div>
@endif
<div class="container">
    @yield('content')
</div>
<div id="black-section">
    <div class="container z-depth-2">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="landing-title">Cómo funciona</div>
                <img src="/images/separator.png" alt="Separador" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="footer-box">
                    <img src="/images/1.png" alt="Uno">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 center-box">
                <div class="footer-box">
                    <img src="/images/2.png" alt="Dos">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="footer-box">
                    <img src="/images/3.png" alt="Tres">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="purple-section">
    <div class="container">
        <div class="col-xs-6"><b>JobForUs</b> © <b>2016 | TODOS LOS DERECHOS RESEVADOS</b></div>
        <div class="col-xs-6 text-right">contacto@jobforus.cl</div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="/js/app.js"></script>
</body>
</html>