@extends('layouts.public')

@section('content')
    @include('dashboard._partials._dashboard_header')
    <div class="row">
        @include('dashboard._partials._dashboard_menu')

        {{-- breadcrumb --}}
        <ol class="breadcrumb">
            <li class="active">Panel de control</li>
        </ol>
        {{-- ./breadcrumb --}}

        {{-- Dashboard content --}}
        <div class="col-md-8">
            <h1>Panel de control</h1>
        </div>
        {{-- dashboard content --}}
    </div>
@endsection
