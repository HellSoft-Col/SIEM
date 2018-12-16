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
                   href="{{url('/resource/search')}}">Nueva búsqueda
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Resultados recursos</h2>
                </div>
            </div>
        </div>

        <hr>
        <p>Estos son los resultados de la búsqueda</p>
        <hr>
        <div class="container-list">
            <ul class="list-unstyled">
                @forelse($resources as $resource)
                    <li class="media my-4">
                        @forelse($resource->files as $file)
                            <div class="col-md-4">
                                <img class="mr-3" src="{{asset($file->path)}}" alt="Generic placeholder image"
                                     style="with:290px;height:171px;">
                            </div>
                            @break
                        @empty
                        @endforelse

                        <div class="media-body d-flex align-items-center">
                            <div class="row ">
                                <div class="col ">
                                    <h5 class="mt-0 mb-1">{{$resource->name}}</h5>
                                    <p class="container-description">{{$resource->description}}</p>
                                </div>
                                @if(Auth::user()->role == 'USER')
                                <div class="col d-flex">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center mx-auto">

                                            <a type="submit"
                                               class="btn btn-dark d-flex align-items-center js-scroll-trigger"
                                               href="{{ url("/resource/view/{$resource->id}") }}">
                                                Reservar
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                @elseif(Auth::user()->role == 'MODERATOR')
                                <div class="col-auto d-flex flex-column">
                                    <button class="btn btn-dark btn-sm m-1" href="{{url("/resource/view/{$resource->id}")}}">Ver recurso</button>
                                    <button class="btn btn-dark btn-sm m-1" type="submit">Gestionar reservas</button>
                                </div>
                                @elseif(Auth::user()->role == 'ADMIN')
                                <div class="col-auto d-flex flex-column">
                                    <a class="btn btn-dark btn-sm m-1" href="{{url("/resource/view/{$resource->id}")}}">Ver recurso</a>
                                    <a class="btn btn-dark btn-sm m-1" href="{{url('/resource/view/'.$resource->id.'/reservations')}}">Gestionar reservas</a>
                                    <a class="btn btn-dark btn-sm m-1" href="{{url('/admin/resource/edit/'.$resource->id)}}">Editar recurso</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    <hr>
                @empty

                @endforelse
            </ul>
        </div>
    </div>
@endsection
