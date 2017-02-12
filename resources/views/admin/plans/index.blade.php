@extends('layouts.admin')

@section('content')

    <!-- Counter Examples -->
    <div class="block-header">
        <h2>
            Administración
        </h2>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Lista de planes</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <a href="{{route('admin-plans.create')}}" class="btn btn-primary">Nuevo plan</a>
                </div>
                @if($data->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Tipo de usuario</th>
                                <th>Valor</th>
                                <th>Vigencia</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td><b>Nombre:</b> {{$item->name}}</td>
                                    <td class="collapsing">{{$item->getUserTypeParam()}}</td>
                                    <td class="collapsing">{{$item->price}}</td>
                                    <td class="collapsing">
                                        @if( $item->quantity == 0 )
                                            Indefinido
                                        @else
                                            {{$item->quantity}} días
                                        @endif
                                    </td>
                                    <td rowspan="2" class="collapsing" style="vertical-align: middle">
                                        @if($item->id > 2)
                                            <a href="{{route('admin-plans.edit', $item->id)}}" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#m{{$item->id}}">Eliminar</a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="m{{$item->id}}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">¿Seguro desea eliminar este Plan?</h4>
                                                            <small>Esta acción es irreversible y asignará el plan Básico a todas las cuentas que lo tengan contratado.</small>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('admin-plans.destroy', [$item->id])}}"
                                                                  method="POST"
                                                                  class="text-center">

                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ./ Modal --}}

                                        @else
                                            <a href="{{route('admin-plans.edit', $item->id)}}" class="btn btn-warning">Editar</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <b>Descripción:</b> {!! $item->description !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning"><b>No existen planes registrados</b></div>
                @endif
            </div>
        </div>
    </div>
@endsection