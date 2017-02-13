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
                    <h2>Cartas de presentación</h2>
                    <small>Estado de las cartas</small>
                </div>
                @if(Request::has('user_id'))
                    <div class="body">
                        <p class="help-block">Filtrar:</p>
                        <a href="{{route('cover-letters.index')}}" class="btn btn-warning">Eliminar Filtro</a>
                    </div>
                @endif
                @include('layouts._partials._alert')
                <div class="body table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Persona</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr @if( $item->status == 0 && $item->reason == null ) style="border-left: solid 5px #009688; background-color: #E0F2F1;" @endif>
                                <td class="collapsing">{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('cover-letters.index', ['user_id' => $item->user_id]) }}">
                                        {{ $item->user->profile->name }} {{ $item->user->profile->last_name }}
                                    </a>
                                </td>
                                <td class="collapsing">
                                    <a href="{{ route('cover-letters.index', ['user_id' => $item->user_id]) }}">{{ $item->user->username }}</a>
                                </td>
                                <td class="collapsing">{{ $item->getStatusParam() }}</td>
                                <td class="collapsing">{{ $item->created_at }}</td>
                                <td class="collapsing">
                                    <a href="{{ route('cover-letters.edit', $item->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#m{{ $item->id }}">Eliminar</a>
                                    {{-- Modal --}}
                                    <div class="modal fade" id="m{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">¿Seguro desea eliminar esta carta?</h4>
                                                    <small>Esta acción es irreversible</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('cover-letters.destroy', [$item->id])}}"
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
            </div>
        </div>
    </div>
@endsection