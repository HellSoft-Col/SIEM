@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="#">Publicaciones</a>
    <a class="dropdown-item" href="#">Eventos</a>
@endsection
@section('content')

    <div class="container result">
        <div class="d-flex flex-row ">
            <div class="d-flex align-items-center mx-auto">
                <button type="submit" class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Nueva búsqueda</button>
            </div>
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
                <li class="media my-4">
                    <img class="mr-3" src="{{asset('/img/sala_test.jpg')}}" alt="Generic placeholder image" style="with:290px;height:171px;">
                    <div class="media-body d-flex align-items-center">
                        <div class="row flexcontainer">
                            <div class="col itemcenter">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col itemright d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <button type="submit" class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
@endsection
