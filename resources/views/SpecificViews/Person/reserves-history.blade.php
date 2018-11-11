@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="#">Publicaciones</a>
    <a class="dropdown-item" href="#">Eventos</a>
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
        <hr>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                   value="{{url('/person/reservation/active')}}">
                            Activas
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                   value="{{url('/person/reservation/history')}}" checked>Historial
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
        <br>
        <form method="GET" action="{{url('person/reservation/history/{startTime}/{endTime}')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col">
                    <label>Fecha Inicio - Hora Inicio:</label>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepickerStart" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                   data-target="#datetimepickerStart" name="startTime" value="{{old('startTime')}}"/>
                            <div class="input-group-append" data-target="#datetimepickerStart"
                                 data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepickerStart').datetimepicker({
                            format:'YYYY-MM-DD'
                        });
                    });
                </script>
                <div class="col">
                    <label>Fecha Fin - Hora Fin:</label>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepickerEnd" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                   data-target="#datetimepickerEnd" name="endTime" value="{{old('endTime')}}"/>
                            <div class="input-group-append" data-target="#datetimepickerEnd"
                                 data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepickerEnd').datetimepicker({
                            format:'YYYY-MM-DD'
                        });
                    });
                </script>
                <div class="col-auto d-flex flex-column">
                    <button class="btn btn-dark d-flex align-self-center js-scroll-trigger">Filtrar reservas</button>
                </div>
            </div>
            <hr>

        </form>
        <div class="container-list">
            <ul class="list-unstyled">
                @if (!empty($reservations))
                    @foreach($reservations as $reservation)
                        <li class="media my-4">
                            <div class="col-md-4">
                                <img class="mr-3" src="{{asset($reservation['imagePath'])}}"
                                     alt="Generic placeholder image" style="with:290px;height:171px;>
                            <div class=" media-body d-flex align-items-center">
                            </div>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h5 class="mt-0 mb-1">Recurso: {{$reservation['name']}}</h5>
                                        <p>Salón: {{$reservation['salon']}}
                                            <br>Inicio: {{$reservation['inicio']}}<br>Fin: {{$reservation['fin']}}</p>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <a class="btn btn-dark " href="{{url('/resource/view/'.$reservation['id_resource'])}}">Ver recurso</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <h1>No tiene historial de reservas</h1>
                @endif
            </ul>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection
