@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')
        <div class="col-md-8">
            {{-- breadcrumb --}}
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}">Panel de control</a></li>
                <li><a href="{{route('letters.index')}}">Cartas de presentación</a></li>
                <li class="active">Nueva carta</li>
            </ol>
            {{-- ./breadcrumb --}}

            {{-- Dashboard content --}}
            <form action="{{route('letters.update', $data)}}" class="form-horizontal" method="POST">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                {{-- name field --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-lg-4 control-label">Título de la carta *</label>

                    <div class="col-lg-6">
                        <input id="name"
                               type="text"
                               class="form-control"
                               name="name"
                               value="{{ old('name') ?? $data->name }}"
                               required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- ./name field --}}

                {{-- description field --}}
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-lg-4 control-label">Descripción *</label>

                    <div class="col-lg-6">
                        <textarea name="description"
                                  id="ckeditor"
                                  class="form-control">{{old('description') ?? $data->description}}</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- ./description field --}}

                {{-- job type field --}}
                <div class="form-group{{ $errors->has('job_type_id') ? ' has-error' : '' }}">
                    <label for="job_type_id" class="col-md-4 control-label">Preferencia de Trabajo *</label>
                    <div class="col-md-6">
                        <select id="job_type_id"
                                class="form-control"
                                name="job_type_id"
                                required>
                            @foreach($jobs_types as $item)
                                <option value="{{$item->id}}"
                                        {{old('job_type_id') == $item->id || $data->job_type_id == $item->id ? 'selected' : ''}}>{{$item->name}}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('job_type_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('job_type_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- ./ job type field --}}

                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                </div>

            </form>
            {{-- dashboard content --}}
        </div>
    </div>
@endsection
