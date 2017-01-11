@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-xs-12 text-center">
            <div class="landing-title">Ficha</div>
            <img src="/images/separator.png" alt="Separador" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <div class="alert alert-primary">
                    <b>Tipo de trabajo:</b> {{$data->jobType->name}}
                </div>
            </div>
            <hr>
            {!! $data->description !!}
            @if(Auth::check() && Auth::user()->profile->user_type == 6)
                @if(Auth::user()->membership->isValid())
                    <a data-toggle="modal" data-target="#contact-data" href="#" class="btn btn-success btn-block">Ver datos de contacto</a>
                    <div class="modal fade" id="contact-data" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Datos de contacto</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="ui table">
                                        <tbody>
                                        <tr>
                                            <td class="collapsing">Nombre</td>
                                            <td>{{$data->user->profile->name}} {{$data->user->profile->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="collapsing">Email</td>
                                            <td>{{$data->user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="collapsing">Teléfono</td>
                                            <td>{{$data->user->profile->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td class="collapsing">Facebook</td>
                                            <td>{{$data->user->profile->facebook}}</td>
                                        </tr>
                                        <tr>
                                            <td class="collapsing">Twitter</td>
                                            <td>{{$data->user->profile->twitter}}</td>
                                        </tr>
                                        <tr>
                                            <td class="collapsing">Otro</td>
                                            <td>{{$data->user->profile->other}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="well">
                        Para contactar a esta persona usted debe contratar un plan
                        <a href="{{route('dashboard.index')}}">aquí</a>
                    </div>
                @endif
            @else
                <div class="well">
                    Para contactar a esta persona usted debe registrar una cuenta de empresa
                    <a href="{{route('register')}}">aquí</a>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <table class="ui table">
                <tr>
                    <td class="collapsing"><b>Nombre:</b></td>
                    <td>{{$data->user->profile->name}} {{$data->user->profile->last_name}}</td>
                </tr>
                <tr>
                    <td class="collapsing"><b>Situación laboral:</b></td>
                    <td>{{$data->user->profile->employment_situation}}</td>
                </tr>
                <tr>
                    <td class="collapsing"><b>Años de experiencia:</b></td>
                    <td>{{$data->user->profile->experience}}</td>
                </tr>
                <tr>
                    <td class="collapsing"><b>Nivel de estudio:</b></td>
                    <td>{{$data->user->profile->study_level}}</td>
                </tr>
                <tr>
                    <td class="collapsing"><b>Título:</b></td>
                    <td>{{$data->user->profile->study_title}}</td>
                </tr>
                <tr>
                    <td class="collapsing"><b>Idioma(s):</b></td>
                    <td>{{$data->user->profile->languages}}</td>
                </tr>
                <tr>
                    <td class="collapsing"><b>Otro:</b></td>
                    <td>{{$data->user->profile->curricular_other}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
