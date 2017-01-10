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
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{route('users.edit', $data->id)}}">Editar</a></li>
                                <li>
                                    <a data-toggle="modal" data-target="#destroy">Eliminar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    {{-- Modal --}}
                    <div class="modal fade" id="destroy" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">¿Seguro desea eliminar este usuario?</h4>
                                    <small>Recuerde que todos los datos asociados también serán eliminados</small>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('users.destroy', $data->id)}}"
                                          method="POST"
                                          class="text-center">

                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ./ Modal --}}
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

                        {{-- Person--}}

                        @if($data->profile->user_type == 4)
                            <tr>
                                <td class="collapsing"><b>Preferencia de trabajo</b></td>
                                <td>{{$data->profile->jobType->name}}</td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Ubicación</b></td>
                                <td>{{$data->profile->location->name}}</td>
                            </tr>
                            @if($data->profile->location->id == 1)
                                <tr>
                                    <td class="collapsing"><b>Región</b></td>
                                    <td>{{$data->profile->region->name}}</td>
                                </tr>
                            @endif
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
                                <td colspan="2"><b>Formación y empleo</b></td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Situación de empleo</b></td>
                                <td>{{$data->profile->employment_situation}}</td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Experiencia</b></td>
                                <td>{{$data->profile->experience}}</td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Nivel de estudios</b></td>
                                <td>{{$data->profile->study_level}}</td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Titulo</b></td>
                                <td>{{$data->profile->study_title}}</td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Idiomas</b></td>
                                <td>{{$data->profile->languages}}</td>
                            </tr>
                            <tr>
                                <td class="collapsing"><b>Otros (Curricular)</b></td>
                                <td>{{$data->profile->curricular_other}}</td>
                            </tr>
                        @else

                        @endif

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