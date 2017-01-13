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
                    <form action="{{route('admin-plans.store')}}" method="POST">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- username --}}
                                <label for="username">Nombre de usuario</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('username') ? ' error' : '' }}">
                                        <input type="text" id="username" class="form-control" name="username">
                                    </div>
                                    @if ($errors->has('username'))
                                        <label class="error">{{ $errors->first('username') }}</label>
                                    @endif
                                </div>
                                {{-- ./ username --}}
                            </div>

                            <div class="col-lg-6">
                                {{-- email --}}
                                <label for="email">Correo electrónico</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('email') ? ' error' : '' }}">
                                        <input type="email" id="email" class="form-control" name="email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <label class="error">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                {{-- ./ email --}}
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                {{-- password --}}
                                <label for="password">Contraseña</label>
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
                                <label for="password_confirmation">Confirme contraseña</label>
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

                        <button class="btn btn-primary waves-effect" type="submit">Crear</button>
                        <a href="{{route('admin-users.index')}}" class="btn btn-default">Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection