@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="{{url('/feed')}}">Publicaciones</a>
    <a class="dropdown-item" href="{{url('/events')}}">Eventos</a>
@endsection
@section('content')
    <div class="container result">
        <div class="d-flex flex-row">
            <div class="d-flex justify-content-start">
                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                   href="{{url('/resource/search')}}">Nueva búsqueda
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Reservas {{$resource->name}}</h2>
                </div>
            </div>
        </div>
        <form method="POST" action="{{url('/person/reservation/delete')}}">
            {{csrf_field()}}
            <div class="row">
                <p>Estos son los resultados de la búsqueda</p>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check" for="checkAll">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="checkAll" name="all[]" value="all">
                            Seleccionar todas
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="d-flex align-items-right mx-auto">
                        <button class="btn btn-dark d-flex align-items-right js-scroll-trigger">Cancelar reservas
                            seleccionadas
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-list">
                <ul class="list-unstyled">
                    @if (!empty($reservations))
                        @foreach($reservations as $reservation)
                            <li class="media my-6">
                                <div class="col-md-4">
                                    <div class="form-check " for="checkOne">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="checkOne" name="selected[]"
                                                   value="{{$reservation['id']}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="media-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h5 class="mt-0 mb-1">{{$reservation['name']}}</h5>
                                            <p>{{$reservation['salon']}}<br>{{$reservation['inicio']}}
                                                <br>{{$reservation['fin']}}</p>
                                        </div>

                                    </div>
                                    <div class="col d-flex justify-content-end ">
                                        <div class="col d-flex justify-content-end">
                                            <div class="d-flex align-items-center mx-auto">
                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                                    recurso</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        @endforeach
        </form>
                     @else
                        <h1>No posee reservas activas en este momento</h1>
                    @endif
                </ul>
            </div>
    </div>

@endsection