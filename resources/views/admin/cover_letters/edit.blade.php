@extends('layouts.admin')

@section('content')

    <!-- Counter Examples -->
    <div class="block-header">
        <h2>
            Administración
            <small>Edición de carta</small>
        </h2>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$data->user->profile->name}} {{$data->user->profile->last_name}}</h2>
                    <small>{{$data->name}}</small>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <form id="register" action="{{route('cover-letters.update', $data->id)}}"
                          method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        {{-- username --}}
                        <label for="name">Nombre</label>
                        <div class="form-group">
                            <div class="form-line{{ $errors->has('name') ? ' error' : '' }}">
                                <input type="text" id="name" class="form-control" name="name"
                                       value="{{old('name') ?? $data->name}}">
                            </div>
                            @if ($errors->has('name'))
                                <label class="error">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        {{-- ./ username --}}

                        {{-- description --}}
                        <label for="description">Descripción</label>
                        <div class="form-group">
                            <div class="form-line{{ $errors->has('description') ? ' error' : '' }}">
                                <textarea name="description" id="ckeditor">
                                    {!! old('description') ?? $data->description !!}
                                </textarea>
                            </div>
                            @if ($errors->has('description'))
                                <label class="error">{{ $errors->first('description') }}</label>
                            @endif
                        </div>
                        {{-- ./ description --}}

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- status --}}
                                <label for="status">Estado de la carta</label>
                                <select name="status" class="form-control show-tick">
                                    <option value="{{(int)TRUE}}"
                                            {{$data->status == (int)TRUE ? 'selected':null}}>
                                        Aprobado
                                    </option>
                                    <option value="{{(int)FALSE}}"
                                            {{$data->status == (int)FALSE ? 'selected':null}}>
                                        No aprobado
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                    <label class="error">{{ $errors->first('status') }}</label>
                                @endif
                                {{-- ./ status --}}
                            </div>
                            <div class="col-lg-6">
                                {{-- reason --}}
                                <label for="reason">Razón o nota</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('reason') ? ' error' : '' }}">
                                        <input type="text" id="reason" class="form-control" name="reason"
                                               value="{{old('reason') ?? $data->reason}}">
                                    </div>
                                    <div class="help-block">Obligatorio solo si no es aprobada</div>
                                    @if ($errors->has('reason'))
                                        <label class="error">{{ $errors->first('reason') }}</label>
                                    @endif
                                </div>
                                {{-- ./ reason --}}
                            </div>
                        </div>

                        <button class="btn btn-primary waves-effect" type="submit">Actualizar</button>
                        <a href="{{route('cover-letters.index')}}" class="btn btn-default">Volver</a>

                    </form>

                </div>
                @if(count($other) > 0)
                    {{-- Assoc --}}
                    <div class="body table-responsive">
                        <h4>Otras cartas relacionadas</h4>
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
                            @foreach($other as $item)
                                <tr @if( $item->status == 0 ) style="border-left: solid 5px #009688; background-color: #E0F2F1;" @endif>
                                    <td class="collapsing">{{$item->name}}</td>
                                    <td>{{$item->user->profile->name}} {{$item->user->profile->last_name}}</td>
                                    <td class="collapsing">{{$item->user->username}}</td>
                                    <td class="collapsing">{{$item->getStatusParam()}}</td>
                                    <td class="collapsing">{{$item->created_at}}</td>
                                    <td class="collapsing">
                                        <a href="{{route('cover-letters.edit', $item->id)}}" class="btn btn-primary">Ver</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#m{{$item->id}}">Eliminar</a>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="m{{$item->id}}" tabindex="-1">
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
                    {{-- ./Assoc --}}
                @endif
            </div>
        </div>
    </div>
@endsection