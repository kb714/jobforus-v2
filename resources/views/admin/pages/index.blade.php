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
                    <h2>Lista de páginas</h2>
                </div>
                @include('layouts._partials._alert')
                @if($data->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td class="collapsing">
                                        <a href="{{route('pages.edit', $item->id)}}" class="btn btn-warning">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-info text-right">
                        JobFor<b>Us</b>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <b>No existen páginas registrados en el sistema</b>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection