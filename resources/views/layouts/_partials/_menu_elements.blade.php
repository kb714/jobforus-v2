<li class="{{Request::segment(1) == '' ? 'active' : ''}}"><a href="{{route('home.index')}}">Inicio</a></li>
<li><a href="{{route('home.page', 'como-funciona')}}">Cómo funciona</a></li>
<li><a href="{{route('home.page', 'transparentes')}}">Transparentes</a></li>
<li><a href="{{route('home.page', 'contacto')}}">Contáctenos</a></li>
@if(Auth::check())
    <li><a class="purple" href="{{route('dashboard.index')}}">
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