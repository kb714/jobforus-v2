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
                    <h2>Tipos de membresías (planes)</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Tipo de usuario</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td class="collapsing">{{!$item->price ? 'Gratuita' : $item->price}}</td>
                                <td class="collapsing">{{$item->getUserTypeParam()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection