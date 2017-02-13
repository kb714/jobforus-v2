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
                    <p class="help-block">Filtrar:</p>
                    <a href="{{route('memberships.index', ['status' => 0])}}" class="btn btn-warning">Pendientes</a>
                    <a href="{{route('memberships.index', ['status' => 4])}}" class="btn btn-success">Aprobados</a>
                    <a href="{{route('memberships.index', ['status' => 6])}}" class="btn btn-danger">Rechazados</a>
                    <div class="help-block">Buscar orden:</div>
                    <form action="{{route('memberships.index')}}">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- order --}}
                                <label for="username">Orden</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('order') ? ' error' : '' }}">
                                        <input type="text" id="order" class="form-control" name="order"
                                               value="{{old('order') ?? ''}}">
                                    </div>
                                    @if ($errors->has('order'))
                                        <label class="error">{{ $errors->first('order') }}</label>
                                    @endif
                                </div>
                                {{-- ./ order --}}
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary waves-effect" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
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
                                    @if($item->user)
                                        <td>{{ $item->user->profile->name }} {{ $item->user->profile->last_name }}</td>
                                    @else
                                        <td><i>eliminado</i></td>
                                    @endif
                                    @if($item->user)
                                        <td class="collapsing">{{ $item->user->username }}</td>
                                    @else
                                        <td><i>eliminado</i></td>
                                    @endif
                                    <td class="collapsing">{{ $item->getStatusParam() }}</td>
                                    @if($item->user)
                                        <td class="collapsing">{{ $item->user->email }}</td>
                                    @else
                                        <td><i>eliminado</i></td>
                                    @endif
                                    <td class="collapsing">{{ $item->order }}</td>
                                    <td class="collapsing">
                                        {{ $item->plan->name }}
                                        <br>
                                        {{ $item->plan->price }}
                                    </td>
                                    <td class="collapsing">{{ $item->created_at }}</td>
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