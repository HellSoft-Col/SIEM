@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/home/menu.css') }}">
@endsection

@section('content')
    <div class="container" style="margin-top: 0;">
        <div class="row space">
            <div class="col-lg-12 space">
                <h2>Enlaces y Servicios de interés</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 ">
                <div class="div-table wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                     style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="div-table-row">
                        <div class="div-table-col">
                            <a href="{{url('/moderator/resource/hand-over')}}">
                                <img src="{{asset('/svg/icons/hanging-over-the-key.svg')}}" height="55">
                            </a>
                        </div>
                        <div class="div-table-col">
                            <div class="media-body">
                                <a href="{{url('/moderator/resource/hand-over')}}">
                                    <h5 class="media-heading">Entregar recurso</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="div-table wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                     style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="div-table-row">
                        <div class="div-table-col">
                            <a href="{{url('/person/search')}}">
                                <img src="{{asset('/svg/icons/persons.svg')}}" height="55">
                            </a>
                        </div>
                        <div class="div-table-col">
                            <div class="media-body">
                                <a href="{{url('/person/search')}}">
                                    <h5 class="media-heading">Personas</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="div-table wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                     style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="div-table-row">
                        <div class="div-table-col">
                            <a href="{{url('/resource/search')}}">
                                <img src="{{asset('/svg/icons/resources.svg')}}" height="55">
                            </a>
                        </div>
                        <div class="div-table-col">
                            <div class="media-body">
                                <a href="{{url('/resource/search')}}">
                                    <h5 class="media-heading">Recursos</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <div class="div-table wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                     style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="div-table-row">
                        <div class="div-table-col">
                            <a>
                                <img src="{{asset('/svg/icons/informs.svg')}}" height="55">
                            </a>
                        </div>
                        <div class="div-table-col">
                            <div class="media-body">
                                <a>
                                    <h5 class="media-heading ">Informes</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="div-table wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                     style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="div-table-row">
                        <div class="div-table-col">
                            <a>
                                <img src="{{asset('/svg/icons/events.svg')}}" height="55">
                            </a>
                        </div>
                        <div class="div-table-col">
                            <div class="media-body">
                                <a>
                                    <h5 class="media-heading">Eventos</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="div-table wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                     style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="div-table-row">
                        <div class="div-table-col">
                            <a>
                                <img src="{{asset('/svg/icons/posts.svg')}}" height="55">
                            </a>
                        </div>
                        <div class="div-table-col">
                            <div class="media-body">
                                <a>
                                    <h5 class="media-heading">Publicaciones</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

