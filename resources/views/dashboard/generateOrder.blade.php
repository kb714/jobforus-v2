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

            <div class="alert alert-primary text-center">
                <b> Su plan actual es</b>: Cuenta {{Auth::user()->membership->plan->name}}
            </div>
            <hr>
            <p class="text-center"><b>Orden generada</b></p>
            @include('dashboard._partials._display_order')

        </div>
        {{-- dashboard content --}}
    </div>
@endsection
