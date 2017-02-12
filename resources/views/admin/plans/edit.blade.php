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
                    <h2>Nuevo plan</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <form action="{{route('admin-plans.update', $data)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- name --}}
                                <label for="name">Nombre *</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('name') ? ' error' : '' }}">
                                        <input type="text" id="name" class="form-control" name="name" value="{{old('name') ?? $data->name}}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <label class="error">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                                {{-- ./ name  --}}
                            </div>

                            <div class="col-lg-6">
                                {{-- price --}}
                                <label for="price">Precio *</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('price') ? ' error' : '' }}">
                                        <input type="number" id="price" class="form-control" name="price" value="{{old('price') ?? $data->price}}">
                                    </div>
                                    @if ($errors->has('price'))
                                        <label class="error">{{ $errors->first('price') }}</label>
                                    @endif
                                </div>
                                {{-- ./ price --}}
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                {{-- user_type_id --}}
                                <label for="user_type_id">Tipo de usuario</label>
                                <select name="user_type_id" class="form-control show-tick">
                                    <option value="4"
                                            {{old('user_type_id') == 4 || $data->user_type_id == 4 ? 'selected':null}}>
                                        Persona
                                    </option>
                                    <option value="6"
                                            {{old('user_type_id') == 6 || $data->user_type_id == 6 ? 'selected':null}}>
                                        Empresa
                                    </option>
                                </select>
                                @if ($errors->has('user_type_id'))
                                    <label class="error">{{ $errors->first('user_type_id') }}</label>
                                @endif
                                {{-- ./ user_type_id --}}
                            </div>

                            <div class="col-lg-6">
                                {{-- quantity --}}
                                <label for="quantity">Cantidad (días) *</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('quantity') ? ' error' : '' }}">
                                        <input type="number" id="quantity" class="form-control" name="quantity" value="{{old('quantity') ?? $data->quantity}}">
                                    </div>
                                    @if ($errors->has('quantity'))
                                        <label class="error">{{ $errors->first('quantity') }}</label>
                                    @endif
                                </div>
                                {{-- ./ quantity --}}
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                {{-- highlight --}}
                                <label for="highlight">¿Destacar?</label>
                                <select name="highlight" class="form-control show-tick">
                                    <option value="{{ (int) FALSE }}"
                                            {{old('highlight') == (int) FALSE || $data->highlight == (int) FALSE ? 'selected':null}}>
                                        No
                                    </option>
                                    <option value="{{ (int) TRUE }}"
                                            {{old('highlight') == (int) TRUE || $data->highlight == (int) TRUE ? 'selected':null}}>
                                        Si
                                    </option>
                                </select>
                                @if ($errors->has('highlight'))
                                    <label class="error">{{ $errors->first('highlight') }}</label>
                                @endif
                                {{-- ./ highlight --}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                {{-- description --}}
                                <label for="description">Descripción</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('description') ? ' error' : '' }}">
                                <textarea name="description" id="ckeditor">
                                    {{ old('description') ?? $data->description }}
                                </textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <label class="error">{{ $errors->first('description') }}</label>
                                    @endif
                                </div>
                                {{-- ./ description --}}
                            </div>
                        </div>

                        <button class="btn btn-primary waves-effect" type="submit">Actualizar</button>
                        <a href="{{route('admin-plans.index')}}" class="btn btn-default">Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection