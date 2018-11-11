@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Reservas {{$user['name']}}</h2>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                   value="{{url('/person/penalties/'.$user['id'].'/actives')}}">
                            Activas
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                   value="{{url('/person/penalties/'.$user['id'].'/history')}}" checked>Historial
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
        <form method="GET" action="{{url('person/penalties/history/{startTime}/{endTime}/'.$user['id'])}}">
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
                            format: 'YYYY-MM-DD'
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
                            format: 'YYYY-MM-DD'
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
                @if (!empty($penalties))
                    @foreach($penalties as $penalty)
                        <li class="media my-6">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h5 class="mt-0 mb-1">Multa {{$penalty['id']}}</h5>
                                        <p>Razón de la multa: {{$penalty['reason']}}<br>Fecha en que
                                            finalizó: {{$penalty['penalty_end']}}</p>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <a class="btn btn-dark " href="">Ver recurso</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <h1>No tiene historial de multas</h1>
                @endif
            </ul>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
@endsection
