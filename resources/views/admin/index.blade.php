@extends('layouts.admin')

@section('content')

    <!-- Counter Examples -->
    <div class="block-header">
        <h2>
            Administración
        </h2>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Personas registradas</div>
                    <div class="number count-to" data-from="0" data-to="{{$person_count}}" data-speed="1000" data-fresh-interval="20">{{$person_count}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-teal hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">location_city</i>
                </div>
                <div class="content">
                    <div class="text">Compañías registradas</div>
                    <div class="number count-to" data-from="0" data-to="{{$company_count}}" data-speed="1000" data-fresh-interval="20">{{$company_count}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">work</i>
                </div>
                <div class="content">
                    <div class="text">Tipos de trabajo</div>
                    <div class="number count-to" data-from="0" data-to="{{$job_type_count}}" data-speed="1000" data-fresh-interval="20">{{$job_type_count}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection