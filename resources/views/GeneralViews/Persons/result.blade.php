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
                   href="{{url('/person/search')}}">Nueva búsqueda
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Resultados personas</h2>
                </div>
            </div>
        </div>

        <hr>
        <p>Estos son los resultados de la búsqueda</p>
        <hr>
        <div class="container-list">
            <ul class="list-unstyled">
                @forelse($people as $person)
                    <li class="media my-4 justify-content-center">
                            <div class="col-md-4 d-flex justify-content-start">
                                <img class="mr-3" src="{{asset($person->file->path)}}" alt="Generic placeholder image"
                                     style="with:290px;height:171px;">
                            </div>
                        <div class="d-flex align-items-center">
                            <div class="row ">
                                <div class="col container-description">
                                    <h5 >{{$person->name}}</h5>
                                    <p>Estudiante de:{{$person->carreer->name}} <br> {{$person->semester}} Semestre: <br>ID: {{$person->identification}}</p>
                                </div>
                                <div class="col-auto d-flex flex-column">
                                        <a class="btn btn-dark btn-sm m-1" href="{{url("/person/view/{$person->id}")}}">Ver persona</a>
                                        <button class="btn btn-dark btn-sm m-1" href="">Gestionar reservas</button>
                                        <button class="btn btn-dark btn-sm m-1" href="">Editar persona</button>
                                        <button class="btn btn-dark btn-sm m-1" href="">Eliminar persona</button>
                                </div>
                            </div>

                        </div>
                    </li>
                    <hr>
                @empty
                    <h2>En el momento no se encontraron resultados</h2>
                @endforelse
            </ul>
        </div>
    </div>
@endsection