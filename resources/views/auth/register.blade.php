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

                        {{-- PERSON REGISTRATION FIELDSET--}}
                        <fieldset v-if="user_type == 4" class="fieldset">

                            <legend class="text-center">Datos Personales</legend>

                            <span class="help-block text-center">
                                <strong>Estos datos se usarán para que seas contactado</strong>
                            </span>

                            {{-- PERSON NAME --}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre *</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control"
                                           name="name"
                                           {{old('name') ? 'value='.old('name').'' : null}}
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
                                           {{old('last_name') ? 'value='.old('last_name').'' : null}}
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
                                           {{old('identifier') ? 'value='.old('identifier').'' : null}}
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
                                           {{old('phone') ? 'value='.old('phone').'' : null}}
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
                                           {{old('facebook') ? 'value='.old('facebook').'' : null}}
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
                                           {{old('twitter') ? 'value='.old('twitter').'' : null}}
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
                                           {{old('other') ? 'value='.old('other').'' : null}}
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
                                                    {{old('job_type_id') == $item->id ? 'selected' : ''}}>{{$item->name}}
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
                                       value="{{old('location_id') ? old('location_id') : 1}}">
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
                        {{-- ./PERSON REGISTRATION FIELDSET --}}

                        {{-- ./COMPANY REGISTRATION FIELDSET --}}
                        <fieldset v-else-if="user_type == 6" class="fieldset">

                            <legend class="text-center">Datos de Empresa</legend>

                            {{-- COMPANY IDENTIFIER--}}
                            <div class="form-group{{ $errors->has('identifier') ? ' has-error' : '' }}">
                                <label for="identifier" class="col-md-4 control-label">RUT *</label>

                                <div class="col-md-6">
                                    <input id="identifier"
                                           type="text"
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

                            {{-- COMPANY NAME --}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre o razón social *</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control"
                                           name="name"
                                           {{old('name') ? 'value='.old('name').'' : null}}
                                           required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY COMMERCIAL BUSINESS --}}
                            <div class="form-group{{ $errors->has('commercial_business') ? ' has-error' : '' }}">
                                <label for="commercial_business" class="col-md-4 control-label">Giro *</label>

                                <div class="col-md-6">
                                    <input id="commercial_business"
                                           type="text"
                                           class="form-control"
                                           name="commercial_business"
                                           {{old('commercial_business') ? 'value='.old('commercial_business').'' : null}}
                                           required>

                                    @if ($errors->has('commercial_business'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('commercial_business') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY INDUSTRY --}}
                            <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                                <label for="industry" class="col-md-4 control-label">Industria *</label>

                                <div class="col-md-6">
                                    <input id="industry"
                                           type="text"
                                           class="form-control"
                                           name="industry"
                                           {{old('industry') ? 'value='.old('industry').'' : null}}
                                           required>

                                    @if ($errors->has('industry'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY ADDRESS --}}
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Dirección *</label>

                                <div class="col-md-6">
                                    <input id="address"
                                           type="text"
                                           class="form-control"
                                           name="address"
                                           {{old('address') ? 'value='.old('address').'' : null}}
                                           required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY PHONE --}}
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Teléfono *</label>

                                <div class="col-md-6">
                                    <input id="phone"
                                           type="text"
                                           class="form-control"
                                           name="phone"
                                           {{old('phone') ? 'value='.old('phone').'' : null}}
                                           required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY CONTACT NAME --}}
                            <div class="form-group{{ $errors->has('company_contact_name') ? ' has-error' : '' }}">
                                <label for="company_contact_name" class="col-md-4 control-label">Nombre persona de contacto *</label>

                                <div class="col-md-6">
                                    <input id="company_contact_name"
                                           type="text"
                                           class="form-control"
                                           name="company_contact_name"
                                           {{old('company_contact_name') ? 'value='.old('company_contact_name').'' : null}}
                                           required>

                                    @if ($errors->has('company_contact_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_contact_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY CONTACT POSITION --}}
                            <div class="form-group{{ $errors->has('company_contact_position') ? ' has-error' : '' }}">
                                <label for="company_contact_position" class="col-md-4 control-label">Cargo persona de contacto *</label>

                                <div class="col-md-6">
                                    <input id="company_contact_position"
                                           type="text"
                                           class="form-control"
                                           name="company_contact_position"
                                           {{old('company_contact_position') ? 'value='.old('company_contact_position').'' : null}}
                                           required>

                                    @if ($errors->has('company_contact_position'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_contact_position') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY CONTACT EMAIL --}}
                            <div class="form-group{{ $errors->has('company_contact_email') ? ' has-error' : '' }}">
                                <label for="company_contact_email" class="col-md-4 control-label">Email persona de contacto *</label>

                                <div class="col-md-6">
                                    <input id="company_contact_email"
                                           type="text"
                                           class="form-control"
                                           name="company_contact_email"
                                           {{old('company_contact_email') ? 'value='.old('company_contact_email').'' : null}}
                                           required>

                                    @if ($errors->has('company_contact_email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_contact_email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- COMPANY CONTACT PHONE --}}
                            <div class="form-group{{ $errors->has('company_contact_phone') ? ' has-error' : '' }}">
                                <label for="company_contact_phone" class="col-md-4 control-label">Teléfono persona de contacto *</label>

                                <div class="col-md-6">
                                    <input id="company_contact_phone"
                                           type="text"
                                           class="form-control"
                                           name="company_contact_phone"
                                           {{old('company_contact_phone') ? 'value='.old('company_contact_phone').'' : null}}
                                           required>

                                    @if ($errors->has('company_contact_phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_contact_phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </fieldset>
                        {{-- ./COMPANY REGISTRATION FIELDSET--}}

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
