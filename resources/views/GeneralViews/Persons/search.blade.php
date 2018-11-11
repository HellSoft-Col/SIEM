@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/resourceStyle/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="{{url('/feed')}}">Publicaciones</a>
    <a class="dropdown-item" href="{{url('/events')}}">Eventos</a>
@endsection
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-row">
                    <h2 class="title-margin">Personas</h2>
                </div>
            </div>
            <!-- Poner if para el admin para que muestre el div de este col-->
            <div class="col">
                <div class="d-flex flex-row-reverse">
                        <a class="btn btn-dark js-scroll-trigger"
                           href="{{url('/person/resource/search')}}">Añadir persona
                        </a>

                </div>
            </div>
        </div>
        <hr>
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Búsqueda </h3>
            </div>
            <div class="card-body">
                <form id="search_person" class="form" role="form" method="POST" action="{{ url('/person/search/result')}}">
                    @csrf
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="name">Nombres/Apellidos:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="last_name">Apellido:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="username">Username:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="identification">Cédula:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="number" class="form-control" id="identification" name="identification">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="id">ID:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="number" class="form-control" id="id" name="id">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="semester">Semestre:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="number" class="form-control" id="semester" name="semester">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="role">Carrera:</label>
                        <div class="col-lg-6">
                            <select name="carreer" id="carreer" class="form-control" size="0">
                                <option value=""></option>
                                @forelse($carreers as $carreer)
                                    <option value="{{$carreer->name}}">{{$carreer->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!-- Poner if para el monitor para que no muestre el div del rol-->
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="role">Rol:</label>
                        <div class="col-lg-6">
                            <select name="role" id="role" class="form-control" size="0">
                                <option value=""></option>
                                    <option hidden class="sala"
                                            value=""></option>
                                    <option value="ADMIN">Administrador</option>
                                    <option value="USER">Persona</option>
                                    <option value="MODERATOR">Monitor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for="type">Tipo:</label>
                        <div class="col-lg-6">
                            <select name="type" id="type" class="form-control" size="0">
                                <option value=""></option>
                                <option hidden value=""></option>

                                <option value="STUDENT">Estudiante</option>
                                <option hidden value=""></option>

                                <option value="TEACHER">Profesor</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label class="col-lg-2 col-form-label form-control-label d-flex flex-row" for=""></label>
                        <div class="col-lg-6 ">
                            <div class="row ">
                                <div class="col form-check">
                                    <input type="checkbox" class="form-check-input" id="activePenalty" name="activePenalty">
                                    <label class="form-check-label" for="activePenalty">Multas activas</label>
                                </div>
                                <div class="col form-check">
                                    <input type="checkbox" class="form-check-input" id="activeReserves" name="activeReserves">
                                    <label class="form-check-label d-flex justify-content-end" for="activeReserves">Reservas activas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="d-flex flex-row justify-content-center">
                        <button type="submit" class="btn btn-dark js-scroll-trigger space">Buscar</button>
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
    <script src="{{ asset('/js/resource/search/js.js') }}" type="text/javascript"></script>
@endsection
