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
                    <h2>Perfil</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <form action="{{route('admin-profile.store')}}" method="POST">
                        {{csrf_field()}}

                        <div class="help-block">Cambio de contraseña</div>

                        <div class="row">
                            <div class="col-lg-12">
                                {{-- current_password --}}
                                <label for="current_password">Contraseña actual</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('current_password') ? ' error' : '' }}">
                                        <input type="password" id="current_password" class="form-control" name="current_password">
                                    </div>
                                    @if ($errors->has('current_password'))
                                        <label class="error">{{ $errors->first('current_password') }}</label>
                                    @endif
                                </div>
                                {{-- ./ current_password --}}
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                {{-- password --}}
                                <label for="password">Nueva contraseña</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('password') ? ' error' : '' }}">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <label class="error">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                {{-- ./ password --}}
                            </div>

                            <div class="col-lg-6">
                                {{-- password_confirmation --}}
                                <label for="password_confirmation">Confirme nueva contraseña</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('password_confirmation') ? ' error' : '' }}">
                                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <label class="error">{{ $errors->first('password_confirmation') }}</label>
                                    @endif
                                </div>
                                {{-- ./ password_confirmation --}}
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect" type="submit">Actualizar</button>
                        <a href="{{route('admin.index')}}" class="btn btn-default">Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection