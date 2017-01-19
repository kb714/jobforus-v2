@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-xs-12 text-center">
            <div class="landing-title">Últimos Postulantes</div>
            <img src="/images/separator.png" alt="Separador" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @if($data->count() > 0)
                <table class="table landing-table table-striped">
                    <tbody>
                    @foreach($data as $item)
                        <tr class="{{$item->user->membership->plan->highlight ? 'highlight z-depth-1' : ''}}">
                            <td class="hidden-xs">
                                @if($item->user->membership->plan->highlight == (int)true)
                                    <div class="label-highlight text-center">Destacado</div>
                                @endif
                                <div class="job-type-box text-center">
                                    <span class="label label-job z-depth-1">{{$item->jobType->name}}</span>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('home.show', $item->id)}}" class="purple">{{$item->name}}</a>
                                <span class="author">por {{$item->user->username}}</span>
                                <hr class="visible-xs">
                                <div class="purple-location visible-xs"></div>
                                <div class="purple-post">Posteado {{$item->getCreatedAtParam()}}</div>
                            </td>
                            <td class="hidden-xs">
                                <div class="calendar"><i class="glyphicon glyphicon-calendar"></i></div>
                            </td>
                            <td class="hidden-xs">
                                <div class="purple-location"></div>
                                <div class="purple-post">{{$item->getCreatedAtParam()}}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $data->links() }}
                </div>
            @else
                <hr>
                <div class="alert alert-primary text-center">
                    <h5>Actualmente no existe ninguna carta aprobada ingresada al sistema</h5>
                    <hr>
                    <b>JobForUs</b>
                </div>
            @endif
        </div>
    </div>
@endsection
