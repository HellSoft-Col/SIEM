@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
    <!-------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
@endsection
@section('content')
    <div class="container result">
        <a class="btn m-auto" href="{{url()->previous()}}"><i class="fa fa-arrow-circle-left fa-3x"></i></a>
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"></h3>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img src="{{asset($user->file->path)}}" alt="Generic placeholder image"
                             class="w-100 rounded-circle">

                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container">
                            <h2>{{$user->name}}</h2>
                            <hr>
                            <ul class="container details">
                                <li><p><span class="fa fa-graduation-cap" style="width:50px;"></span>Estudiante
                                        de: {{$user->carreer->name}}</p></li>
                                <li><p><span class="fa fa-sort-numeric-asc"
                                             style="width:50px;"></span>Semestre: {{$user->semester}}</p></li>
                                <li><p><span class="fa fa-user" style="width:50px;"></span>ID: {{$user->university_id}}
                                    </p></li>
                                <li><p><span class="fa fa-id-card"
                                             style="width:50px;"></span>Cédula: {{$user->identification}}</p></li>
                            </ul>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 ml-1">
                                    <a class="btn btn-dark btn-lg"
                                       href="{{url('/person/reservations/'.$user->id.'/active')}}">Ver reservas</a>
                                </div>
                                <div class="col-xs-12 ml-3">
                                    <a class="btn btn-dark btn-lg"
                                       href="{{url('/person/penalties/'.$user->id.'/actives')}}">Ver multas</a>
                                </div>
                                <div class="col-xs-12 ml-3">
                                    <a class="btn btn-dark btn-lg" href="{{url('/person/posts/'.$user->id)}}">Ver
                                        publicaciones</a>
                                </div>
                                <div class="col ml-1">
                                    <a class="btn btn-dark btn-lg"
                                       href="{{url('/reservation/view/resources/classroom/'.$user->id)}}">Hacer
                                        Reserva</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection
