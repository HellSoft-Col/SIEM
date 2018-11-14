@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="{{url('/feed')}}">Publicaciones</a>
    <a class="dropdown-item" href="{{url('/events')}}">Eventos</a>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-11">
            <div class="d-flex flex-row justify-content-center">
                <h2 class="title-margin">Entregar Salas</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm">
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio"
                               value=""
                               checked>Salas
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio"
                               value="">Instrumentos
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar..." id="keyWord"
                           name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <br>
                <table class="table table-bordered text-center" id="myTable">

                    <thead class="thead-dark">
                    <tr>
                        <th>Sala-Salón</th>
                        <th>Nombre</th>
                        <th>Fecha-Hora Inicio</th>
                        <th>Fecha-Hora Fin</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($actual_reservations as $actual)
                        <tr class="clickable-row">
                            <th>{{$actual->resource->name}}</th>
                            <th>{{$actual->user->name}}</th>
                            <th>{{$actual->start_time}}</th>
                            <th>{{$actual->end_time}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn-dark btn-lg d-flex justify-content-center">Entregar</button>
                </div>
            </div>
            <div class="col">
                <h3 class="d-flex justify-content-center">Devolver recurso</h3>
                <br>
                <table class="table table-bordered text-center" id="myTable1">
                    <tbody>
                    <thead class="thead-dark">
                    <tr>
                        <th>Sala-salón</th>
                        <th>Tiempo-restante</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    @foreach($running_reservations as $running)
                        <tr class="clickable-row">
                            <th>Example 2</th>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <button class="btn-dark btn-lg d-flex justify-content-center">Devolver</button>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#myTable').on('click', '.clickable-row', function (event) {
                            $(this).addClass('bg-info').siblings().removeClass('bg-info');
                        });
                        $('#myTable1').on('click', '.clickable-row', function (event) {
                            $(this).addClass('bg-info').siblings().removeClass('bg-info');
                        });
                    });
                </script>

            </div>
        </div>
    </div>
@endsection
