@extends('layouts.admin')

@section('content')

    <!-- Counter Examples -->
    <div class="block-header">
        <h2>
            Administración
            <small>Edición de ficha</small>
        </h2>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Editando {{$data->name}}</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <form id="register" action="{{route('pages.update', $data->id)}}"
                          method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        {{-- content --}}
                        <label for="content">Contenido</label>
                        <div class="form-group">
                            <div class="form-line{{ $errors->has('content') ? ' error' : '' }}">
                                <textarea name="content" id="ckeditor">
                                    {{old('content') ?? $data->content}}
                                </textarea>
                            </div>
                            @if ($errors->has('content'))
                                <label class="error">{{ $errors->first('content') }}</label>
                            @endif
                        </div>
                        {{-- ./ content --}}

                        <button class="btn btn-primary waves-effect" type="submit">Actualizar</button>
                        <a href="{{route('pages.index')}}" class="btn btn-default">Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection