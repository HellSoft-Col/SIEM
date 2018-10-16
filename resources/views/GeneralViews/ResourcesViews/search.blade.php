@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/resourceStyle/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="#">Publicaciones</a>
    <a class="dropdown-item" href="#">Eventos</a>
@endsection
@section('content')
    <div class="container">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Búsqueda de recursos</h3>
            </div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="keyWord">Palabra clave</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Colocar palabra clave" id="keyWord"
                                       name="keyWord">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="resource">Recurso</label>
                        <div class="col-lg-9">
                            <select id="resource" class="form-control" size="0" name="selectResource">
                                <option value="room">Sala</option>
                                <option value="instrument">Instrumento</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="typeResource">Tipo de
                            recurso</label>
                        <div class="col-lg-9">
                            <select id="typeResource" class="form-control" size="0" name="selectTypeResource">
                                <option value="studio">Estudio individual</option>
                                <option value="keyboard">Teclado</option>
                                <option value="assemble">Ensamble</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="mainCharacteristic">Característica</label>
                        <div class="col-lg-9">
                            <select id="mainCharacteristic" class="form-control" size="0" name="mainCharacteristic">
                                <option value="c1">Característica 1</option>
                                <option value="c2">Característica 2</option>
                                <option value="c3">Característica 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row d-flex flex-row justify-content-center">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select id="option" class="form-control" size="0" name="option">
                                    <option value="and">And</option>
                                    <option value="or">Or</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select id="additionalCharacteristic" class="form-control" size="0"
                                        name="additionalCharacteristic">
                                    <option value="c1">Característica 1</option>
                                    <option value="c2">Característica 2</option>
                                    <option value="c3">Característica 3</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                       href="#">Añadir</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <a class="btn btn-dark js-scroll-trigger space" href="#">Buscar</a>
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
@endsection
