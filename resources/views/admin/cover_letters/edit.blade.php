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
            </div>
        </div>
    </div>
@endsection