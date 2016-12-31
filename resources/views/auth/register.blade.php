@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="landing-title">Creando nueva cuenta</div>
                <img src="/images/separator.png" alt="Separador" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="text-content">
                <form id="register" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    <div class="col-xs-10 col-md-10 col-md-offset-1 col-xs-offset-1">
                        <legend class="text-center">Datos de acceso</legend>

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input id="username"
                                       type="text"
                                       class="form-control"
                                       name="username"
                                       {{old('username') ? 'value='.old('username').'' : null}}
                                       required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email"
                                       type="email"
                                       class="form-control"
                                       name="email"
                                       {{old('email') ? 'value='.old('email').'' : null}}
                                       required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password"
                                       type="password"
                                       class="form-control"
                                       name="password"
                                       required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required>
                            </div>
                        </div>
                        </fieldset>

                        <div class="text-center">
                            <input id="current-type" type="hidden" value="{{old('user_type') ? old('user_type') : 4}}">
                            <div class="form-group" >
                                <label class="radio-inline">
                                    <input v-model="user_type" type="radio" name="user_type" id="person" value="4">
                                    Persona
                                </label>
                                <label class="radio-inline">
                                    <input v-model="user_type" type="radio" name="user_type" id="company" value="6">
                                    Empresa
                                </label>
                            </div>
                        </div>

                        <fieldset v-if="user_type == 4" class="fieldset">

                            <legend class="text-center">Datos Personales</legend>
                            <span class="help-block text-center">
                                <strong>Estos datos se usarán para que seas contactado</strong>
                            </span>

                            <div class="form-group{{ $errors->has('identifier') ? ' has-error' : '' }}">
                                <label for="identifier" class="col-md-4 control-label">RUT *</label>

                                <div class="col-md-6">
                                    <input id="identifier"
                                           type="identifier"
                                           class="form-control"
                                           name="identifier"
                                           {{old('identifier') ? 'value='.old('identifier').'' : null}}
                                           required>

                                    @if ($errors->has('identifier'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identifier') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Phone') ? ' has-error' : '' }}">
                                <label for="Phone" class="col-md-4 control-label">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="Phone"
                                           type="number"
                                           class="form-control"
                                           {{old('phone') ? 'value='.old('phone').'' : null}}
                                           name="phone">

                                    @if ($errors->has('Phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label for="facebook" class="col-md-4 control-label">Facebook</label>

                                <div class="col-md-6">
                                    <input id="facebook"
                                           type="facebook"
                                           class="form-control"
                                           {{old('facebook') ? 'value='.old('facebook').'' : null}}
                                           name="facebook">

                                    @if ($errors->has('facebook'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                <label for="twitter" class="col-md-4 control-label">Twitter</label>

                                <div class="col-md-6">
                                    <input id="twitter"
                                           type="twitter"
                                           class="form-control"
                                           {{old('twitter') ? 'value='.old('twitter').'' : null}}
                                           name="twitter">

                                    @if ($errors->has('twitter'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('other') ? ' has-error' : '' }}">
                                <label for="other" class="col-md-4 control-label">Otro</label>

                                <div class="col-md-6">
                                    <input id="other"
                                           type="other"
                                           class="form-control"
                                           {{old('other') ? 'value='.old('other').'' : null}}
                                           name="other">

                                    @if ($errors->has('other'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('other') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('job_type_id') ? ' has-error' : '' }}">
                                <label for="job_type_id" class="col-md-4 control-label">Preferencia de Trabajo *</label>
                                <div class="col-md-6">
                                    <select id="job_type_id"
                                            type="job_type_id"
                                            class="form-control"
                                            name="job_type_id"
                                            required>
                                        @foreach($jobs_types as $item)
                                            <option value="{{$item->id}}"
                                                    {{old('location_id') == $item->id ? 'selected' : ''}}>{{$item->name}}
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

                            <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                                <label for="location_id" class="col-md-4 control-label">Ubicación *</label>
                                <input id="current-location"
                                       type="hidden"
                                       value="{{old('location_id') ? old('location_id') : 1}}">
                                <div class="col-md-6">
                                    <select v-model="location"
                                            id="location_id"
                                            type="location_id"
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

                            <div v-if="location == 1" class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                                <label for="region_id" class="col-md-4 control-label">Región *</label>
                                <div class="col-md-6">
                                    <select id="region_id" type="region_id" class="form-control" name="region_id" required>
                                        @foreach($regions as $item)
                                            <option value="{{$item->id}}"
                                                    {{old('region_id') == $item->id ? 'selected' : ''}}>{{$item->name}}
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

                        </fieldset>

                        <fieldset v-else class="fieldset">

                            <legend class="text-center">Datos de Empresa</legend>

                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
