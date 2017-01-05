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
                    <h2>Tipos de trabajo disponibles</h2>
                    <small>No habilitado</small>
                </div>
                <div class="body table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job_types as $item)
                            <tr>
                                <td class="collapsing">{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td class="collapsing">{{$item->getStatusParam()}}</td>
                                <td class="collapsing">
                                    <a href="#" class="btn btn-primary">Cambiar estado</a>
                                    <a href="#" class="btn btn-warning">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection