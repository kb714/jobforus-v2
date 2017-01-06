@extends('layouts.admin')

@section('content')

    <!-- Counter Examples -->
    <div class="block-header">
        <h2>
            Administración
            <small>Ficha de persona</small>
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
                <div class="body table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td class="collapsing"><b>Tipo de usuario</b></td>
                            <td>{{$data->profile->getUserTypeParam()}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>RUT</b></td>
                            <td>{{$data->profile->identifier}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Preferencia de trabajo</b></td>
                            <td>{{$data->profile->jobType->name}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Ubicación</b></td>
                            <td>{{$data->profile->location->name}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Región</b></td>
                            <td>{{$data->profile->region->name}}</td>
                        </tr>
                        <tr class="bg-blue-grey">
                            <td colspan="2"><b>Información de contacto</b></td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Teléfono</b></td>
                            <td>{{$data->profile->phone}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Facebook</b></td>
                            <td>{{$data->profile->facebook}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Twitter</b></td>
                            <td>{{$data->profile->twitter}}</td>
                        </tr>
                        <tr>
                            <td class="collapsing"><b>Otro</b></td>
                            <td>{{$data->profile->other}}</td>
                        </tr>
                        <tr class="bg-blue-grey">
                            <td colspan="2"><b>Formación académica</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="alert">
                    <a href="{{route('users.index')}}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection