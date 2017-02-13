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
                    <h2>Nuevo tipo de trabajo</h2>
                </div>
                @include('layouts._partials._alert')
                <div class="body">
                    <form action="{{route('job-types.update', $data->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- name --}}
                                <label for="name">Nombre *</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('name') ? ' error' : '' }}">
                                        <input type="text"
                                               id="name"
                                               class="form-control"
                                               name="name"
                                               value="{{ old('name') ?? $data->name }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <label class="error">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                                {{-- ./ name  --}}
                            </div>

                            <div class="col-lg-6">
                                {{-- weight --}}
                                <label for="weight">Peso</label>
                                <div class="form-group">
                                    <div class="form-line{{ $errors->has('weight') ? ' error' : '' }}">
                                        <input type="number"
                                               id="weight"
                                               class="form-control"
                                               name="weight"
                                               value="{{ old('weight') ?? $data->weight }}">
                                    </div>
                                    @if ($errors->has('weight'))
                                        <label class="error">{{ $errors->first('weight') }}</label>
                                    @endif
                                </div>
                                {{-- ./ weight --}}
                            </div>
                        </div>

                        <button class="btn btn-primary waves-effect" type="submit">Actualizar</button>
                        <a href="{{route('job-types.index')}}" class="btn btn-default">Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection