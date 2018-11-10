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
                   href="{{url('/person/search/result')}}">Volver
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-md-4 d-flex justify-content-start">
                    <img class="mr-3" src="{{asset($user->file->path)}}" alt="Generic placeholder image"
                         style="with:290px;height:171px;">
                </div>
            </div>
            <div class="col">
                <div class="col container-description">
                    <h5 >{{$user->name}}</h5>
                    <p>Estudiante de: {{$user->carreer->name}}
                        <br> Semestre: {{$user->semester}}
                        <br>ID: {{$user->university_id}}
                        <br>Cédula: {{$user->identification}}</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-auto d-flex flex-column">
                <form method="" action="">
                    <a class="btn btn-dark btn-sm m-1" href="{{url('/person/reservations/'.$user->id.'/active')}}">Ver reservas</a>
                </form>
                <form method="" action="">
                    <button class="btn btn-dark btn-sm m-1" href="">Ver multas</button>
                </form>
                <button class="btn btn-dark btn-sm m-1" href="">Ver publicaciones</button>
            </div>
        </div>

    </div>
@endsection
