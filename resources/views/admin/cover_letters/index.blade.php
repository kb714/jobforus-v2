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
                    <h2>Cartas de presentación</h2>
                    <small>Estado de las cartas</small>
                </div>
                @include('layouts._partials._alert')
                <div class="body table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td class="collapsing">{{$item->id}}</td>
                                <td class="collapsing">{{$item->name}}</td>
                                <td>{{$item->user->profile->name}} {{$item->user->profile->last_name}}</td>
                                <td class="collapsing">{{$item->getStatusParam()}}</td>
                                <td class="collapsing">{{$item->created_at}}</td>
                                <td class="collapsing">
                                    <a href="{{route('cover-letters.edit', $item->id)}}" class="btn btn-primary">Ver</a>
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