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
                    <h2>Lista de planes</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <a href="{{route('admin-plans.create')}}" class="btn btn-primary">Nuevo plan</a>
                </div>
                @if($data->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo de usuario</th>
                                <th>Valor</th>
                                <th>Vigencia</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td class="collapsing">{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td class="collapsing">{{$item->getUserTypeParam()}}</td>
                                    <td class="collapsing">{{$item->price}}</td>
                                    <td class="collapsing">{{$item->quantity}} días</td>
                                    <td class="collapsing">
                                        <a href="{{route('admin-plans.edit', $item->id)}}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning"><b>No existen planes registrados</b></div>
                @endif
            </div>
        </div>
    </div>
@endsection