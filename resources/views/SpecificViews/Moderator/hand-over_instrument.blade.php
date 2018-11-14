@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-11">
            <div class="d-flex flex-row justify-content-center">
                <h2 class="title-margin">Entregar Instrumentos</h2>
            </div>
        </div>
        <hr>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                   value="{{url('/moderator/resource/hand-over/instrument')}}" checked>Instrumentos
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                   value="{{url('/moderator/resource/hand-over/classroom')}}">Salones
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
                        <th>Instrumento</th>
                        <th>Nombre</th>
                        <th>Fecha-Hora Inicio</th>
                        <th>Fecha-Hora Fin</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($actual_reservations as $reservation)
                        <tr class="clickable-row">
                            <th hidden>{{$reservation->id}}</th>
                            <th>{{$reservation->resource->name}}</th>
                            <th>{{$reservation->user->name}}</th>
                            <th>{{$reservation->start_time}}</th>
                            <th>{{$reservation->end_time}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form role="form" method="POST" action="{{ url('/moderator/resource/hand-over') }}">
                    @csrf
                    <input id="reservation_id_over" name="reservation_id" value="0" type="number" hidden>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-dark btn-lg d-flex justify-content-center">Entregar</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <h3 class="d-flex justify-content-center">Devolver recurso</h3>
                <br>

                <table class="table table-bordered text-center" id="myTable1">

                    <thead class="thead-dark">
                    <tr>
                        <th>Recurso</th>
                        <th>Nombre</th>
                        <th>Fecha inicio</th>
                        <th>Fecha final</th>
                        <th>Temporizador de tiempo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($running_reservations as $reservation)
                        <tr class="clickable-row">
                            <th hidden>{{ $reservation->id }}</th>
                            <th>{{ $reservation->resource->name }}</th>
                            <th>{{ $reservation->user->name }}</th>
                            <th>{{ $reservation->start_time }}</th>
                            <th>{{ $reservation->end_time }}</th>
                            <th id="timer-{{$reservation->id}}"></th>
                        </tr>

                    @empty
                        <tr class="clickable-row">
                            <th>No hay datos.</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                @foreach($running_reservations as $reservation)
                    <script>

                        var countDownDate{{$reservation->id}} = new Date("{{ $reservation->end_time }}").getTime();

                        var x{{$reservation->id}} = setInterval(function () {

                            var now{{$reservation->id}} = new Date().getTime();

                            var distance{{$reservation->id}} = countDownDate{{$reservation->id}} - now{{$reservation->id}};

                            var days{{$reservation->id}} = Math.floor(distance{{$reservation->id}} / (1000 * 60 * 60 * 24));
                            var hours{{$reservation->id}} = Math.floor((distance{{$reservation->id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes{{$reservation->id}} = Math.floor((distance{{$reservation->id}} % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds{{$reservation->id}} = Math.floor((distance{{$reservation->id}} % (1000 * 60)) / 1000);

                            document.getElementById("timer-{{$reservation->id}}").innerHTML = days{{$reservation->id}} + " dias " + hours{{$reservation->id}} + " : " + minutes{{$reservation->id}} + " : " + seconds{{$reservation->id}} + "s ";

                            if (distance{{$reservation->id}} < 0) {
                                clearInterval(x);
                                document.getElementById("timer-{{$reservation->id}}").innerHTML = "TARDE";
                            }
                        }, 1000);
                    </script>
                @endforeach


                <script>
                    var countDownDate = new Date("Jan 5, 2019 15:37:25").getTime();

                    var x = setInterval(function () {

                        var now = new Date().getTime();

                        var distance = countDownDate - now;

                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                            + minutes + "m " + seconds + "s ";

                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "EXPIRED";
                        }
                    }, 1000);
                </script>


                <form role="form" method="POST" action="{{ url('/moderator/resource/hand-back') }}">
                    @csrf
                    <input id="reservation_id" name="reservation_id" value="0" type="number" hidden>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-dark btn-lg d-flex justify-content-center">Devolver</button>
                    </div>
                </form>
                <script type="text/javascript">
                    $(function () {
                        $('#myTable').on('click', '.clickable-row', function (event) {
                            $(this).addClass('bg-info').siblings().removeClass('bg-info');
                            $('#reservation_id_over').attr("value", this.cells[0].innerHTML);
                        });
                        $('#myTable1').on('click', '.clickable-row', function (event) {
                            $(this).addClass('bg-info').siblings().removeClass('bg-info');
                            $('#reservation_id').attr("value", this.cells[0].innerHTML);
                        });
                    });
                </script>

            </div>
        </div>
    </div>
@endsection
