<li class="{{Request::segment(1) == '' ? 'active' : ''}}"><a href="{{route('home')}}">Inicio</a></li>
<li><a href="#">Cómo funciona</a></li>
<li><a href="#">Transparentes</a></li>
<li><a href="#">Contáctenos</a></li>
@if(Auth::check())
    <li><a class="purple" href="{{route('dashboard')}}">
            Mi cuenta {{Auth::user()->profile->getUserTypeParam()}}
            <span class="badge">{{Auth::user()->membership->plan->name}}</span></a>
    </li>
    <li><a class="purple" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Desconectar</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@else
    <li>
        <a class="purple {{Request::segment(1) == 'login' ? 'active' : ''}}" href="{{route('login')}}">
            Login
        </a>
    </li>
    <li>
        <a class="purple {{Request::segment(1) == 'register' ? 'active' : ''}}" href="{{route('register')}}">
            Registro
        </a>
    </li>
@endif