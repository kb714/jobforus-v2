@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')
        {{-- Dashboard content --}}
        <div class="col-md-8">
            @if(Auth::user()->coverLetters->count() > 0)
                <div class="help-block"><b>Mis cartas de presentación</b></div>
            @else
                <div class="text-center">
                    <div class="help-block">Usted no tiene ninguna carta de presentación creada</div>
                    <a href="{{route('dashboard.coverLetters.create')}}" class="btn btn-primary">
                        Crear mi primer carta de presentación
                    </a>
                </div>
            @endif
        </div>
        {{-- dashboard content --}}
    </div>
@endsection
