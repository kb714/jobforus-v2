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
