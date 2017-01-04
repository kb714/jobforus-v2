@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')

        {{-- Dashboard content --}}
        <div class="col-md-8">

            {{-- breadcrumb --}}
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Panel de control</a></li>
                <li class="active">Información adicional</li>
            </ol>
            {{-- ./breadcrumb --}}

            {{-- alert partial --}}
            @include('layouts._partials._alert')
            {{-- ./alert partial --}}

            {{-- Personal Information Form --}}
            <form id="register"
                  action="{{route('additional-information.store')}}"
                  method="POST"
                  class="form-horizontal">
                {{csrf_field()}}

                {{-- employment_situation --}}
                <div class="form-group{{ $errors->has('employment_situation') ? ' has-error' : '' }}">
                    <label for="employment_situation" class="col-md-4 control-label">Situación de empleo</label>

                    <div class="col-md-6">
                        <input id="employment_situation"
                               type="text"
                               class="form-control"
                               name="employment_situation"
                               value="{{Auth::user()->profile->employment_situation}}">

                        @if ($errors->has('employment_situation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employment_situation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- experience --}}
                <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                    <label for="experience" class="col-md-4 control-label">Experiencia</label>

                    <div class="col-md-6">
                        <input id="experience"
                               type="text"
                               class="form-control"
                               name="experience"
                               value="{{Auth::user()->profile->experience}}">

                        @if ($errors->has('experience'))
                            <span class="help-block">
                                <strong>{{ $errors->first('experience') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- study_level --}}
                <div class="form-group{{ $errors->has('study_level') ? ' has-error' : '' }}">
                    <label for="study_level" class="col-md-4 control-label">Nivel de estudios</label>

                    <div class="col-md-6">
                        <input id="study_level"
                               type="text"
                               class="form-control"
                               name="study_level"
                               value="{{Auth::user()->profile->study_level}}">

                        @if ($errors->has('study_level'))
                            <span class="help-block">
                                <strong>{{ $errors->first('study_level') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- study_title --}}
                <div class="form-group{{ $errors->has('study_title') ? ' has-error' : '' }}">
                    <label for="study_title" class="col-md-4 control-label">Título</label>

                    <div class="col-md-6">
                        <input id="study_title"
                               type="text"
                               class="form-control"
                               name="study_title"
                               value="{{Auth::user()->profile->study_title}}">

                        @if ($errors->has('study_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('study_title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- languages --}}
                <div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
                    <label for="languages" class="col-md-4 control-label">Idioma(s)</label>

                    <div class="col-md-6">
                        <input id="languages"
                               type="text"
                               class="form-control"
                               name="languages"
                               value="{{Auth::user()->profile->languages}}">

                        @if ($errors->has('languages'))
                            <span class="help-block">
                                <strong>{{ $errors->first('languages') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- curricular_other --}}
                <div class="form-group{{ $errors->has('curricular_other') ? ' has-error' : '' }}">
                    <label for="curricular_other" class="col-md-4 control-label">Otros</label>

                    <div class="col-md-6">
                        <input id="curricular_other"
                               type="text"
                               class="form-control"
                               name="curricular_other"
                               value="{{Auth::user()->profile->curricular_other}}">

                        @if ($errors->has('curricular_other'))
                            <span class="help-block">
                                <strong>{{ $errors->first('curricular_other') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                </div>

            </form>
            {{-- ./Personal Information Form --}}

        </div>
        {{-- dashboard content --}}

    </div>
@endsection
