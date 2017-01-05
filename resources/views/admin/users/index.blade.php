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
                    <h2>Lista de usuarios</h2>
                    <small>No habilitado</small>
                </div>
                @include('layouts._partials._alert')
                @if($users->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Membresía</th>
                                <th>Tipo</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{$item->profile->name}}</td>
                                    <td class="collapsing">{{$item->email}}</td>
                                    <td class="collapsing">{{$item->membership->plan->name}}</td>
                                    <td class="collapsing">{{$item->profile->getUserTypeParam()}}</td>
                                    <td class="collapsing">
                                        <a href="#" class="btn btn-primary">Ver</a>
                                        <a href="#" class="btn btn-warning">Editar</a>
                                        <a href="#" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-info text-right">
                        Página: 1 de 1
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <b>No existen usuarios registrados en el sistema</b>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection