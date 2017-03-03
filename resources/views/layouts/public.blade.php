<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobForUs</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}?q={{rand(5,5000)}}">
</head>
<body>
<div id="app" class="container margin-top-public">
    <div class="row">
        <div class="col-xs-12">
            <div class="social-networks text-right">
                <a href="https://www.facebook.com/jobforus.cl/" target="_blank">
                    <img src="{{asset('images/facebook.png')}}" alt="Facebook Page">
                </a>
                <a href="https://twitter.com/Job_For_Us?cn=YWRkcmVzc19ib29rX2NvbnRhY3RfYWRkZWQ%3D&refsrc=email" target="_blank">
                    <img src="{{asset('images/twitter.png')}}" alt="Twitter Page">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 text-center">
            <img src="/images/logo.png" alt="Logo JobForUs">
        </div>
        <div class="col-lg-9">
            <ul class="header-nav center-pills nav nav-pills hidden-xs">
                @include('layouts._partials._menu_elements')
            </ul>
            <div class="dropdown visible-xs menu-responsive full-width-dropdown">
                <button class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                    Navegación
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    @include('layouts._partials._menu_elements')
                </ul>
                <hr>
            </div>
        </div>
    </div>
</div>
@if(isset($slider))
    <div id="slider-container">
        <div id="jobforus-slider" class="center-block carousel slide" data-ride="carousel" data-interval="15000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/images/slider/01.png" alt="Slider 1">
                    <div class="carousel-caption">
                        <div class="title">
                            Te necesitan. Te buscan. <b>Te encuentran.</b>
                        </div>
                        <div class="form">
                            <form action="{{ route('home.search') }}" class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="q" placeholder="¿A quién buscas? ...">
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
                        <div action="{{route('home.search')}}" class="form">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="q" placeholder="¿A quién buscas? ...">
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
                    <img src="/images/1.jpg" alt="Te necesitan" height="70">
                    <p>La persona perfecta para el trabajo ideal. Un trabajo perfecto para la persona ideal. Es Job for Us.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 center-box">
                <div class="footer-box">
                    <img src="/images/2.jpg" alt="Te buscan" height="70">
                    <p>Escríbelo, cuéntalo, detállalo… ¿qué haces, cómo lo haces, qué has hecho, qué quieres, qué puedes
                        hacer, de qué eres capaz? Regístrate (como PERSONA) y redacta hasta tres cartas de presentación, gratis!!!!!</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="footer-box">
                    <img src="/images/3.jpg" alt="Te encuentran" height="70">
                    <p>Ingresa las palabras mágicas en el buscador para encontrar a la persona indicada, lee las cartas
                        de presentación y contacta al usuario que te ha llamado la atención. Para contactar al usuario
                        debes estar registrado (como EMPRESAS) cancelar la cuota ($20.000) para acceder por 30 días y…..MATCH!!!!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="purple-section">
    <div class="container">
        <div class="col-xs-6"><b>JobForUs</b> © <b>2016 | TODOS LOS DERECHOS RESEVADOS</b></div>
        <div class="col-xs-6 text-right">info@jobforus.cl</div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Ckeditor -->
<script src="/admin-assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/admin-assets/js/pages/forms/editors.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="/js/app.js"></script>
</body>
</html>