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
                <li class="active">Información personal</li>
            </ol>
            {{-- ./breadcrumb --}}

            {{-- alert partial --}}
            @include('layouts._partials._alert')
            {{-- ./alert partial --}}

            {{-- Personal Information Form --}}
            <form id="register"
                  action="{{route('personal-information.store')}}"
                  method="POST"
                  class="form-horizontal">
                {{csrf_field()}}

                {{-- PERSON NAME --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombre *</label>

                    <div class="col-md-6">
                        <input id="name"
                               type="text"
                               class="form-control"
                               name="name"
                               value="{{Auth::user()->profile->name}}"
                               required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON LAST NAME --}}
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name" class="col-md-4 control-label">Apellido *</label>

                    <div class="col-md-6">
                        <input id="last_name"
                               type="text"
                               class="form-control"
                               name="last_name"
                               value="{{Auth::user()->profile->last_name}}"
                               required>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON IDENTIFIER --}}
                <div class="form-group{{ $errors->has('identifier') ? ' has-error' : '' }}">
                    <label for="identifier" class="col-md-4 control-label">RUT *</label>

                    <div class="col-md-6">
                        <input id="identifier"
                               type="text"
                               class="form-control"
                               name="identifier"
                               value="{{Auth::user()->profile->identifier}}"
                               required>

                        @if ($errors->has('identifier'))
                            <span class="help-block">
                                <strong>{{ $errors->first('identifier') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON PHONE --}}
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-md-4 control-label">Teléfono</label>

                    <div class="col-md-6">
                        <input id="phone"
                               type="text"
                               class="form-control"
                               value="{{Auth::user()->profile->phone}}"
                               name="phone">

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON FACEBOOK --}}
                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    <label for="facebook" class="col-md-4 control-label">Facebook</label>

                    <div class="col-md-6">
                        <input id="facebook"
                               type="text"
                               class="form-control"
                               value="{{Auth::user()->profile->facebook}}"
                               name="facebook">

                        @if ($errors->has('facebook'))
                            <span class="help-block">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON TWITTER --}}
                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                    <label for="twitter" class="col-md-4 control-label">Twitter</label>

                    <div class="col-md-6">
                        <input id="twitter"
                               type="text"
                               class="form-control"
                               value="{{Auth::user()->profile->twitter}}"
                               name="twitter">

                        @if ($errors->has('twitter'))
                            <span class="help-block">
                                <strong>{{ $errors->first('twitter') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON OTHER --}}
                <div class="form-group{{ $errors->has('other') ? ' has-error' : '' }}">
                    <label for="other" class="col-md-4 control-label">Otro</label>

                    <div class="col-md-6">
                        <input id="other"
                               type="text"
                               class="form-control"
                               value="{{Auth::user()->profile->other}}"
                               name="other">

                        @if ($errors->has('other'))
                            <span class="help-block">
                                <strong>{{ $errors->first('other') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON JOB TYPE --}}
                <div class="form-group{{ $errors->has('job_type_id') ? ' has-error' : '' }}">
                    <label for="job_type_id" class="col-md-4 control-label">Preferencia de Trabajo *</label>
                    <div class="col-md-6">
                        <select id="job_type_id"
                                class="form-control"
                                name="job_type_id"
                                required>
                            @foreach($jobs_types as $item)
                                <option value="{{$item->id}}"
                                        {{Auth::user()->profile->job_type_id == $item->id ? 'selected' : ''}}>
                                    {{$item->name}}
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

                {{-- PERSON LOCATION --}}
                <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                    <label for="location_id" class="col-md-4 control-label">Ubicación *</label>
                    <input id="current-location"
                           type="hidden"
                           value="{{Auth::user()->profile->location_id ? Auth::user()->profile->location_id : 1}}">
                    <div class="col-md-6">
                        <select v-model="location"
                                id="location_id"
                                class="form-control"
                                name="location_id"
                                required>
                            @foreach($locations as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('location_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- PERSON REGION IF REQUIRED--}}
                <div v-if="location == 1" class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                    <label for="region_id" class="col-md-4 control-label">Región *</label>
                    <div class="col-md-6">
                        <select id="region_id" type="region_id" class="form-control" name="region_id" required>
                            @foreach($regions as $item)
                                <option value="{{$item->id}}"
                                        {{Auth::user()->profile->region_id == $item->id ? 'selected' : ''}}>{{$item->name}}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('region_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('region_id') }}</strong>
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
