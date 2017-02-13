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
                    <h2>Tipos de trabajo disponibles</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <a href="{{ route('job-types.create') }}" class="btn btn-primary">Nuevo tipo de trabajo</a>
                </div>
                <div class="body table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job_types as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td class="collapsing">{{$item->getStatusParam()}}</td>
                                <td class="collapsing">
                                    <a href="#" class="btn btn-primary"
                                       onclick="event.preventDefault();
                                       document.getElementById('change-status-{{$item->id}}').submit();">
                                        Cambiar estado
                                    </a>
                                    <form id="change-status-{{$item->id}}"
                                          action="{{ route('job-types.update', [$item->id]) }}"
                                          method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="hidden"
                                               name="status"
                                               value="{{$item->status ? (int)FALSE : (int)TRUE}}">
                                    </form>
                                    <a href="{{ route('job-types.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                                    @if($item->id > 1)
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#m{{$item->id}}">Eliminar</a>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="m{{$item->id}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">¿Seguro desea eliminar este Tipo de trabajo?</h4>
                                                        <small>Esta acción es irreversible y asignará el tipo de trabajo "A convenir"
                                                            a todas las cuentas <br> y cartas de presentación que lo tengan asignado.</small>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('job-types.destroy', [$item->id])}}"
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
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection