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
                    <h2>Lista de usuarios</h2>
                </div>
                <div class="body">
                    <p class="help-block">Filtrar:</p>
                    <a href="{{ route('users.index') }}"
                       class="btn btn-warning @if(!Request::has('user_type')) disabled @endif">Todos</a>
                    <a href="{{ route('users.index', ['user_type' => 4]) }}"
                       class="btn btn-success @if(Request::get('user_type') == 4) disabled @endif">Personas</a>
                    <a href="{{ route('users.index', ['user_type' => 6]) }}"
                       class="btn btn-danger @if(Request::get('user_type') == 6) disabled @endif">Empresas</a>
                    <div class="help-block">Buscar:</div>
                    <form action="{{route('users.index')}}">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- order --}}
                                <label for="identifier">Usuario/Email</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('identifier') ? ' error' : '' }}">
                                        <input type="text" id="identifier" class="form-control" name="identifier"
                                               value="{{ old('identifier') ?? Request::get('identifier') }}">
                                    </div>
                                    @if ($errors->has('identifier'))
                                        <label class="error">{{ $errors->first('identifier') }}</label>
                                    @endif
                                </div>
                                {{-- ./ order --}}
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary waves-effect" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="body">
                    <a href="{{ route('users.getcsv') }}" class="btn btn-primary">Descargar CSV</a>
                </div>
                @include('layouts._partials._alert')
                @if($data->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Membresía</th>
                                <th>Tipo</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->profile->name}}</td>
                                    <td class="collapsing">{{$item->username}}</td>
                                    <td class="collapsing">{{$item->email}}</td>
                                    <td class="collapsing">{{$item->membership->plan->name}}</td>
                                    <td class="collapsing">{{$item->profile->getUserTypeParam()}}</td>
                                    <td class="collapsing">
                                        <a href="{{route('users.show', $item->id)}}" class="btn btn-primary">Ver</a>
                                        <a href="{{route('users.edit', $item->id)}}" class="btn btn-warning">Editar</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#m{{$item->id}}">Eliminar</a>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="m{{$item->id}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">¿Seguro desea eliminar este usuario?</h4>
                                                        <small>Recuerde que todos los datos asociados también serán eliminados</small>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('users.destroy', [$item->id])}}"
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
                    <div class="dataTables_paginate paging_simple_numbers text-right body">
                        {{ $data->links() }}
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <b>No existen usuarios registrados en el sistema</b>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection