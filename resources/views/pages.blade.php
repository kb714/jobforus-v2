@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-xs-12 text-center">
            <div class="landing-title">{{$data->name}}</div>
            <img src="/images/separator.png" alt="Separador" width="100%">
        </div>
    </div>
    <div class="row">
        @if($data->slug == 'contacto')
            <div class="col-md-6">
                {!! $data->content !!}
                <hr>
                @include('layouts._partials._alert')
                <form action="{{route('home.contact')}}" method="POST">

                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label>Asunto</label>
                        <input class="form-control" type="text" name="subject">
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label>Mensaje</label>
                        <textarea class="form-control" name="message"></textarea>
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
            <div class="hidden-xs col-md-6">
                <img class="img-thumbnail" src="{{asset('images/contacto.png')}}" alt="Contacto">
            </div>
        @else
            <div class="col-md-12">
                <hr>
                {!! $data->content !!}
            </div>
        @endif
    </div>
@endsection
