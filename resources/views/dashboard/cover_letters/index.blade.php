@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')

        {{-- Dashboard content --}}
        <div class="col-md-8">

            {{-- breadcrumb --}}
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Panel de control</a></li>
                <li class="active">Cartas de presentación</li>
            </ol>
            {{-- ./breadcrumb --}}

            {{-- alert partial --}}
            @include('layouts._partials._alert')
            {{-- ./alert partial --}}

            @if(Auth::user()->coverLetters->count() > 0)
                <div class="help-block"><b>Mis cartas de presentación</b></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->coverLetters as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->getStatusParam()}}</td>
                            <td>
                                <a href="#">Editar</a>
                                <a href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <div class="help-block">Usted no tiene ninguna carta de presentación creada</div>
                    <a href="{{route('cartas.create')}}" class="btn btn-primary">
                        Crear mi primer carta de presentación
                    </a>
                </div>
            @endif
        </div>
        {{-- dashboard content --}}

    </div>
@endsection
