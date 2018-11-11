@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Mis reservas</h2>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                   value="{{url('/person/reservation/active')}}"
                                   checked>Activas
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                   value="{{url('/person/reservation/history')}}">Historial
                        </label>
                    </div>
                </div>
            </div>
        </form>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            $('input[type="radio"]').on('click', function () {
                window.location = $(this).val();
            });
        </script>
        <hr>
        <form method="POST" action="{{url('/person/reservation/delete')}}">
            {{csrf_field()}}
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
                                            <input type="checkbox" class="form-check-input" id="checkOne"
                                                   name="selected[]"
                                                   value="{{$reservation['id']}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <h5 class="mt-0 mb-1">Recurso: {{$reservation['name']}}</h5>
                                            <p>Salón: {{$reservation['salon']}}<br>Inicio: {{$reservation['inicio']}}
                                                <br>Fin: {{$reservation['fin']}}</p>
                                        </div>
                                        <div class="col-auto d-flex flex-column">
                                            <a class="btn btn-dark "
                                               href="{{url('/resource/view/'.$reservation['id_resource'])}}">Ver
                                                recurso</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        @endforeach

                    @else
                        <h1>No posee reservas activas en este momento</h1>
                    @endif
                </ul>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection
