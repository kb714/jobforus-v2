@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')

        {{-- Dashboard content --}}
        <div class="col-md-8">
            {{--breadcrumb --}}
            {{--<ol class="breadcrumb">--}}
            {{--<li class="active">Panel de control</li>--}}
            {{--</ol>--}}
            {{--./breadcrumb --}}

            {{-- alert partial --}}
            @include('layouts._partials._alert')
            {{-- ./alert partial --}}

            <div class="alert alert-primary text-center">
                <b> Su plan actual es</b>: Cuenta {{Auth::user()->membership->plan->name}}
            </div>
            <hr>
            @if(Auth::user()->membership->isValid())
                <p class="text-center"><b>Usted tiene un plan premium activo</b></p>
                <table class="ui table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Iniciado</th>
                        <th>Finaliza</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{Auth::user()->membership->plan->name}}</td>
                        <td>{{Auth::user()->membership->getBeginningAtParam()}}</td>
                        <td>{{Auth::user()->membership->getEndsAtParam()}}</td>
                        <td>{{Auth::user()->membership->plan->price}}</td>
                    </tr>
                    </tbody>
                </table>
            @else
                @if(Auth::user()->payPlanPending())
                    <div class="help-block text-center">
                        Tiene un pago pendiente
                    </div>
                    @include('dashboard._partials._display_order')
                @else
                    <p class="text-center"><b>¿Desea cambiar su plan?</b></p>
                    @if($plan->count() == 0)
                        <div class="alert alert-info text-center">Aún no existen planes premium para su cuenta</div>
                    @else
                        <table class="ui table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Duración</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plan as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}} días</td>
                                    <td class="collapsing">
                                        <form action="{{route('dashboard.order')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="plan_id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-primary">Contratar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
            @endif

        </div>
        {{-- dashboard content --}}
    </div>
@endsection
