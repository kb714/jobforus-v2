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
                    <h2>Lista de Administradores</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <a href="{{route('admin-users.create')}}" class="waves-effect waves-light btn btn-primary">Nuevo Administrador</a>
                </div>
                @if($data->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->username}}</td>
                                    <td class="collapsing">{{$item->email}}</td>
                                    <td class="collapsing">
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#m{{$item->id}}">Eliminar</a>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="m{{$item->id}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">¿Seguro desea eliminar este administrador?</h4>
                                                        <small>Recuerde que todos los datos asociados también serán eliminados</small>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin-users.destroy', [$item->id])}}"
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-info text-right">
                        JobFor<b>Us</b>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <b>No existen administradores registrados en el sistema</b>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection