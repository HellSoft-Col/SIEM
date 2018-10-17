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
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Mis reservas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                               checked>Activas
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Historial
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <label>Fecha Inicio - Hora Inicio:</label>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="input-group date" id="datetimepickerStart" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                               data-target="#datetimepickerStart"/>
                        <div class="input-group-append" data-target="#datetimepickerStart" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepickerStart').datetimepicker();
                });
            </script>
            <div class="col">
                <label>Fecha Fin - Hora Fin:</label>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="input-group date" id="datetimepickerEnd" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerEnd"/>
                        <div class="input-group-append" data-target="#datetimepickerEnd" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepickerEnd').datetimepicker();
                });
            </script>
        </div>
        <div class="container-list">
            <ul class="list-unstyled">
                <li class="media my-4">
                    <img class="mr-3" src="{{asset('/img/image_resource.jpg')}}" alt="Generic placeholder image">
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-center js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="media my-4">
                    <img class="mr-3" src="{{asset('/img/image_resource.jpg')}}" alt="Generic placeholder image">
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-center js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="media my-4">
                    <img class="mr-3" src="{{asset('/img/image_resource.jpg')}}" alt="Generic placeholder image">
                    <
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-center js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
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
