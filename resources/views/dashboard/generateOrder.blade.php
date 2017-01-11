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

            @if(Auth::user()->profile->user_type == 4)
                <div class="alert alert-primary text-center">
                    <b> Su plan actual es</b>: Cuenta {{Auth::user()->membership->plan->name}}
                </div>
            @else
                <div class="alert alert-primary text-center">
                    <b> Su plan actual es</b>: Cuenta {{Auth::user()->membership->plan->name}}
                </div>
                <hr>
                <p class="text-center"><b>Orden generada</b></p>
                <div class="alert alert-danger text-center">
                    No olvide incluir su orden de compra en el identificador de webpay.cl
                    <br>
                    Orden: <b>{{$data->order}}</b>
                </div>
                <table class="ui table">
                    <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Plan</th>
                        <th>Valor</th>
                        <th>Duración</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$data->order}}</td>
                        <td>{{$data->plan->name}}</td>
                        <td>{{$data->plan->price}}</td>
                        <td>{{$data->plan->quantity}} días</td>
                    </tr>
                    </tbody>
                    <tfoot class="full-width">
                    <tr>
                        <th colspan="4" class="text-right">
                            <p class="text-center">
                                <a href="https://www.webpay.cl/portalpagodirecto/pages/institucion.jsf?idEstablecimiento=24808484"
                                   target="_blank"
                                   class="btn btn-primary">Pagar</a>
                            </p>
                        </th>
                    </tr>
                    </tfoot>
                </table>
                <div class="alert alert-success text-center">
                    una vez que pague su membresía en webpay.cl deberá esperar a que se acredite su pago, se le enviará
                    un correo de notificación a <b>{{Auth::user()->email}}</b> cuando su cuenta sea actualizada
                </div>
            @endif

        </div>
        {{-- dashboard content --}}
    </div>
@endsection
