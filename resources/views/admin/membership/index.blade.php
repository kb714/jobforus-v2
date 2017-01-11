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
                    <h2>Membresías con pagos pendientes</h2>
                </div>
                <div class="body">
                    <p class="help-block">Ver:</p>
                    <a href="{{route('memberships.index', ['status' => 0])}}" class="btn btn-warning">Pendientes</a>
                    <a href="{{route('memberships.index', ['status' => 4])}}" class="btn btn-success">Aprobados</a>
                    <a href="{{route('memberships.index', ['status' => 6])}}" class="btn btn-danger">Rechazados</a>
                </div>
                @include('layouts._partials._alert')
                @if($data->count() > 0)
                    <div class="body table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Cuenta</th>
                                <th>Estado</th>
                                <th>Email</th>
                                <th>Orden</th>
                                <th>Detalles del Plan</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->user->profile->name}} {{$item->user->profile->last_name}}</td>
                                    <td class="collapsing">{{$item->user->username}}</td>
                                    <td class="collapsing">{{$item->getStatusParam()}}</td>
                                    <td class="collapsing">{{$item->user->email}}</td>
                                    <td class="collapsing">{{$item->order}}</td>
                                    <td class="collapsing">
                                        {{$item->plan->name}}
                                        <br>
                                        {{$item->plan->price}}
                                    </td>
                                    <td class="collapsing">{{$item->created_at}}</td>
                                    <td class="collapsing">
                                        @if($item->status == 0)
                                            {{-- action--}}
                                            <a href="#" class="btn btn-success"
                                               onclick="event.preventDefault();
                                                       document.getElementById('s4-{{$item->id}}').submit();">Aceptar</a>

                                            <form id="s4-{{$item->id}}" action="{{ route('memberships.store') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="hidden" name="status" value="4">
                                            </form>
                                            {{-- action --}}
                                            <a href="#" class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                       document.getElementById('s6-{{$item->id}}').submit();">Rechazar</a>

                                            <form id="s6-{{$item->id}}" action="{{ route('memberships.store') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="hidden" name="status" value="6">
                                            </form>

                                        @else
                                            {{-- action --}}
                                            <a href="#" class="btn btn-warning"
                                               onclick="event.preventDefault();
                                                       document.getElementById('s0-{{$item->id}}').submit();">Declarar pendiente</a>

                                            <form id="s0-{{$item->id}}" action="{{ route('memberships.store') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="hidden" name="status" value="0">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning"><b>No existen pagos registrados</b></div>
                @endif
            </div>
        </div>
    </div>
@endsection