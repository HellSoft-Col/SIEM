@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="#">Publicaciones</a>
    <a class="dropdown-item" href="#">Eventos</a>
@endsection
@section('content')
    <div class="container">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Crear reserva</h3>
            </div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="keyWord">Fecha Inicio - Hora
                            Inicio:</label>
                        <div class="col-lg-9">
                            <div class="input-group date" id="datetimepickerStart" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                       data-target="#datetimepickerStart"/>
                                <div class="input-group-append" data-target="#datetimepickerStart"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepickerStart').datetimepicker();
                                });
                            </script>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="keyWord">Fecha Fin - Hora
                            Fin:</label>
                        <div class="col-lg-9">
                            <div class="input-group date" id="datetimepickerEnd" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                       data-target="#datetimepickerEnd"/>
                                <div class="input-group-append" data-target="#datetimepickerEnd"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepickerEnd').datetimepicker();
                            });
                        </script>

                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <a class="btn btn-dark js-scroll-trigger space" href="#">Realizar Reserva</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection
