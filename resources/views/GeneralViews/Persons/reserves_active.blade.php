@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="#">Publicaciones</a>
    <a class="dropdown-item" href="#">Eventos</a>
@endsection
@section('content')
    <div class="container">
        <div class=" row d-flex flex-row">
            <div class="d-flex justify-content-start">
                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                   href="{{url()->previous()}}">Volver
                </a>
            </div>
            <div class=" col d-flex justify-content-end">
                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                   href="{{ route('create.reservation') }}">Crear reserva
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Reservas {{$user['name']}}</h2>
                </div>
            </div>
        </div>
        <hr>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="{{url('/person/reservations/'.$user['id'].'/active')}}"
                                   checked>Activas
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="{{url('/person/reservations/'.$user['id'].'/history')}}">Historial
                        </label>
                    </div>
                </div>
            </div>
        </form>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            $('input[type="radio"]').on('click', function() {
                window.location = $(this).val();
            });
        </script>
        <hr>
        <form method="POST" action="{{url('/person/reservation/deleteAdminMonitor')}}">
            {{csrf_field()}}
            <input hidden value="{{$user['id']}}" name="id">
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
                        <button class="btn btn-dark d-flex align-items-right js-scroll-trigger" >Cancelar reservas
                            seleccionadas</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-list">
                <ul class="list-unstyled">
                    @if (!empty($reservations))
                        @foreach($reservations as $reservation)
                            <li class="media my-6">
                                <div class="col-sm-3 d-flex align-items-center mx-auto">
                                    <div class="form-check col-2" for="checkOne">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="checkOne" name="selected[]"
                                                   value="{{$reservation['id']}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="media-body d-flex align-items-center">
                                    <div class="row flexcontainer">
                                        <div class="col itemcenter">
                                            <h5 class="mt-0 mb-1">{{$reservation['name']}}</h5>
                                            <p>{{$reservation['salon']}}<br>{{$reservation['inicio']}}<br>{{$reservation['fin']}}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <a class="btn btn-dark btn-sm m-1" href="{{url("/person/view/{$user->id}")}}">Ver usuario</a>
                                        <a class="btn btn-dark btn-sm m-1" href="{{url("/reservation/edit/{$reservation['id']}")}}">Editar reserva</a>
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
@section('scripts')
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection