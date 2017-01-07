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
                    <h2>{{$data->profile->name}} {{$data->profile->last_name}}</h2>
                    <small>{{$data->email}}</small>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <form id="register" action="{{route('users.update', $data->id)}}"
                          method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- username --}}
                                <label for="username">Usuario</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('username') ? ' error' : '' }}">
                                        <input type="text" id="username" class="form-control" name="username"
                                               value="{{old('username') ?? $data->username}}">
                                    </div>
                                    @if ($errors->has('username'))
                                        <label class="error">{{ $errors->first('username') }}</label>
                                    @endif
                                </div>
                                {{-- ./ username --}}
                            </div>
                            <div class="col-lg-6">
                                {{-- email --}}
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('email') ? ' error' : '' }}">
                                        <input type="text" id="email" class="form-control" name="email"
                                               value="{{old('email') ?? $data->email}}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <label class="error">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                {{-- ./ email --}}
                            </div>
                        </div>

                        @if($data->profile->user_type == 4)
                            {{-- PERSON --}}
                            <div class="help-block">Datos Personales</div>

                            <div class="row">

                                {{-- name --}}
                                <div class="col-lg-6">
                                    <label for="name">Nombre *</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('name') ? ' error' : '' }}">
                                            <input type="text" id="name" class="form-control" name="name"
                                                   value="{{old('name') ?? $data->profile->name}}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <label class="error">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ name --}}

                                {{-- last_name --}}
                                <div class="col-lg-6">
                                    <label for="last_name">Apellido *</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('last_name') ? ' error' : '' }}">
                                            <input type="text" id="last_name" class="form-control" name="last_name"
                                                   value="{{old('last_name') ?? $data->profile->last_name}}">
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <label class="error">{{ $errors->first('last_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ last_name --}}

                            </div>

                            <div class="row">
                                {{-- identifier --}}
                                <div class="col-lg-6">
                                    <label for="identifier">RUT *</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('identifier') ? ' error' : '' }}">
                                            <input type="text" id="identifier" class="form-control" name="identifier"
                                                   value="{{old('identifier') ?? $data->profile->identifier}}">
                                        </div>
                                        @if ($errors->has('identifier'))
                                            <label class="error">{{ $errors->first('identifier') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ identifier --}}

                                {{-- phone --}}
                                <div class="col-lg-6">
                                    <label for="phone">Teléfono</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('phone') ? ' error' : '' }}">
                                            <input type="text" id="phone" class="form-control" name="phone"
                                                   value="{{old('phone') ?? $data->profile->phone}}">
                                        </div>
                                        @if ($errors->has('phone'))
                                            <label class="error">{{ $errors->first('phone') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ phone --}}
                            </div>

                            <div class="row">
                                {{-- facebook --}}
                                <div class="col-lg-6">
                                    <label for="facebook">Facebook</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('facebook') ? ' error' : '' }}">
                                            <input type="text" id="facebook" class="form-control" name="facebook"
                                                   value="{{old('facebook') ?? $data->profile->facebook}}">
                                        </div>
                                        @if ($errors->has('facebook'))
                                            <label class="error">{{ $errors->first('facebook') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ facebook --}}

                                {{-- twitter --}}
                                <div class="col-lg-6">
                                    <label for="twitter">Twitter</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('twitter') ? ' error' : '' }}">
                                            <input type="text" id="twitter" class="form-control" name="twitter"
                                                   value="{{old('twitter') ?? $data->profile->twitter}}">
                                        </div>
                                        @if ($errors->has('twitter'))
                                            <label class="error">{{ $errors->first('twitter') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ twitter --}}
                            </div>

                            <div class="row">
                                {{-- other --}}
                                <div class="col-lg-6">
                                    <label for="other">Otro</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('other') ? ' error' : '' }}">
                                            <input type="text" id="other" class="form-control" name="other"
                                                   value="{{old('other') ?? $data->profile->other}}">
                                        </div>
                                        @if ($errors->has('other'))
                                            <label class="error">{{ $errors->first('other') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ other --}}

                                {{-- job_preference --}}
                                <div class="col-lg-6">
                                    <label for="job_type_id">Preferencia de trabajo *</label>
                                    <select name="job_type_id" class="form-control show-tick">
                                        @foreach($jobs_types as $item)
                                            <option value="{{$item->id}}"
                                                    {{$data->profile->job_type_id == $item->id ? 'selected':null}}>
                                                {{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('job_type_id'))
                                        <label class="error">{{ $errors->first('job_type_id') }}</label>
                                    @endif
                                </div>
                                {{-- ./ job_preference --}}
                            </div>

                            <div class="row">
                                {{-- job_preference --}}
                                <div class="col-lg-6">
                                    <label for="other">Ubicación *</label>
                                    <input id="current-location"
                                           type="hidden"
                                           value="{{old('location_id') ?? $data->profile->location_id}}">
                                    <select v-model="location" name="location_id" class="form-control show-tick">
                                        @foreach($locations as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('location_id'))
                                        <label class="error">{{ $errors->first('location_id') }}</label>
                                    @endif
                                </div>
                                {{-- ./ job_preference --}}

                                {{-- region_id --}}
                                <div v-show="location == 1" class="col-lg-6">
                                    <label for="other">Región *</label>
                                    <select name="region_id" class="form-control show-tick">
                                        @foreach($regions as $item)
                                            <option value="{{$item->id}}"
                                                    {{$data->profile->region_id == $item->id ? 'selected':null}}>
                                                {{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('region_id'))
                                        <label class="error">{{ $errors->first('region_id') }}</label>
                                    @endif
                                </div>
                                {{-- ./ region_id --}}
                            </div>

                            <div class="help-block">Información curricular</div>

                            <div class="row">

                                {{-- employment_situation --}}
                                <div class="col-lg-6">
                                    <label for="employment_situation">Situación de empleo</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('employment_situation') ? ' error' : '' }}">
                                            <input type="text" id="employment_situation" class="form-control" name="employment_situation"
                                                   value="{{old('employment_situation') ?? $data->profile->employment_situation}}">
                                        </div>
                                        @if ($errors->has('employment_situation'))
                                            <label class="error">{{ $errors->first('employment_situation') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ employment_situation --}}

                                {{-- experience --}}
                                <div class="col-lg-6">
                                    <label for="experience">Experiencia</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('experience') ? ' error' : '' }}">
                                            <input type="text" id="experience" class="form-control" name="experience"
                                                   value="{{old('experience') ?? $data->profile->experience}}">
                                        </div>
                                        @if ($errors->has('experience'))
                                            <label class="error">{{ $errors->first('experience') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ experience --}}

                            </div>

                            <div class="row">

                                {{-- study_level --}}
                                <div class="col-lg-6">
                                    <label for="study_level">Experiencia</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('study_level') ? ' error' : '' }}">
                                            <input type="text" id="study_level" class="form-control" name="study_level"
                                                   value="{{old('study_level') ?? $data->profile->study_level}}">
                                        </div>
                                        @if ($errors->has('study_level'))
                                            <label class="error">{{ $errors->first('study_level') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ study_level --}}

                                {{-- study_title --}}
                                <div class="col-lg-6">
                                    <label for="study_title">Título</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('study_title') ? ' error' : '' }}">
                                            <input type="text" id="study_title" class="form-control" name="study_title"
                                                   value="{{old('study_title') ?? $data->profile->study_title}}">
                                        </div>
                                        @if ($errors->has('study_title'))
                                            <label class="error">{{ $errors->first('study_title') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ study_title --}}

                            </div>

                            <div class="row">

                                {{-- languages --}}
                                <div class="col-lg-6">
                                    <label for="languages">Idioma (s)</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('languages') ? ' error' : '' }}">
                                            <input type="text" id="languages" class="form-control" name="languages"
                                                   value="{{old('languages') ?? $data->profile->languages}}">
                                        </div>
                                        @if ($errors->has('languages'))
                                            <label class="error">{{ $errors->first('languages') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ languages --}}

                                {{-- curricular_other --}}
                                <div class="col-lg-6">
                                    <label for="curricular_other">Otros (curricular)</label>
                                    <div class="form-group">
                                        <div class="form-line{{ $errors->has('curricular_other') ? ' error' : '' }}">
                                            <input type="text" id="curricular_other" class="form-control" name="curricular_other"
                                                   value="{{old('curricular_other') ?? $data->profile->curricular_other}}">
                                        </div>
                                        @if ($errors->has('curricular_other'))
                                            <label class="error">{{ $errors->first('curricular_other') }}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- ./ curricular_other --}}

                            </div>

                        @else
                            {{-- COMPANY --}}
                            <div class="help-block">Información de la empresa</div>
                        @endif

                        <button class="btn btn-primary waves-effect" type="submit">Actualizar</button>
                        <a href="{{route('users.index')}}" class="btn btn-default">Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection