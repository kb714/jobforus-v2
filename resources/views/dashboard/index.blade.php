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
                    Perfil de empresa en implementación
                </div>
            @endif

        </div>
        {{-- dashboard content --}}
    </div>
@endsection
