@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')

        {{-- Dashboard content --}}
        <div class="col-md-8">

            {{-- breadcrumb --}}
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}">Panel de control</a></li>
                <li class="active">Seguridad</li>
            </ol>
            {{-- ./breadcrumb --}}

            {{-- alert partial --}}
            @include('layouts._partials._alert')
            {{-- ./alert partial --}}

            {{-- Change password form --}}
            <form id="register"
                  action="{{route('security.store')}}"
                  method="POST"
                  class="form-horizontal">
                {{csrf_field()}}

                <div class="help-block">Para realizar cualquier cambio en esta sección debe ingresar su contraseña</div>

                {{-- current password --}}
                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                    <label for="current_password" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-6">
                        <input id="current_password"
                               type="password"
                               class="form-control"
                               name="current_password">

                        @if ($errors->has('current_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <hr>

                {{-- Change password --}}
                <div class="help-block">Cambio de contraseña</div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Nueva contraseña</label>

                    <div class="col-md-6">
                        <input id="password"
                               type="password"
                               class="form-control"
                               name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="col-md-4 control-label">Confirme</label>

                    <div class="col-md-6">
                        <input id="password_confirmation"
                               type="password"
                               class="form-control"
                               name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <hr>

                {{-- email change --}}
                <div class="help-block">Cambio de correo</div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Correo actual</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{Auth::user()->email}}</p>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Nuevo Correo</label>

                    <div class="col-md-6">
                        <input id="email"
                               type="text"
                               class="form-control"
                               name="email"
                               value="{{old('email')}}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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
