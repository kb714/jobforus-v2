@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')

        {{-- Dashboard content --}}
        <div class="col-md-8">

            {{-- breadcrumb --}}
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}">Panel de control</a></li>
                <li class="active">Cartas de presentación</li>
            </ol>
            {{-- ./breadcrumb --}}

            {{-- alert partial --}}
            @include('layouts._partials._alert')
            {{-- ./alert partial --}}

            @if(Auth::user()->coverLetters->count() > 0)
                <div class="help-block">
                    <b>Mis cartas de presentación</b>
                    <a href="{{route('letters.create')}}" class="btn btn-primary pull-right">
                        Añadir Carta
                    </a>
                    <hr>
                </div>
                <table class="ui celled compact table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->coverLetters as $item)
                        <tr>
                            <td class="collapsing">{{$item->name}}</td>
                            <td>
                                {{$item->getStatusParam()}}
                                @if( $item->reason && $item->status == (int) FALSE )
                                    <hr>
                                    <div class="alert alert-warning">
                                        <b>Esta carta no fue aprobada por la siguiente razón: </b>{{$item->reason}}
                                    </div>
                                @endif
                            </td>
                            <td class="collapsing">
                                <a href="{{ route('letters.edit', $item) }}">Editar</a>
                                <a href="#" data-toggle="modal" data-target="#m{{$item->id}}">Eliminar</a>
                                <div class="modal fade" id="m{{$item->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">¿Seguro desea eliminar esta carta?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('letters.destroy', [$item->id])}}"
                                                      method="POST"
                                                      class="text-center">

                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Eliminar</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <div class="help-block">Usted no tiene ninguna carta de presentación creada</div>
                    <a href="{{route('letters.create')}}" class="btn btn-primary">
                        Crear mi primer carta de presentación
                    </a>
                </div>
            @endif
        </div>
        {{-- dashboard content --}}

    </div>
@endsection
