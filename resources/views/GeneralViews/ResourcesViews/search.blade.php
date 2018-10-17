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
                <form id="search_resource" class="form" role="form" method="POST"
                      action="{{ route('resource.search') }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="keyWord">Palabra clave</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Colocar palabra clave" id="keyWord"
                                       name="keyword">
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
                            <select onchange="onChangeEvent()" id="resource" class="form-control" size="0"
                                    name="rcategory">
                                <option value=""></option>
                                <option value="CLASSROOM">Sala</option>
                                <option value="INSTRUMENT">Instrumento</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="typeResource">Tipo de
                            recurso</label>
                        <div class="col-lg-9">
                            <select id="typeResource" class="form-control" size="0"
                                    name="rtype">
                                <option value=""></option>
                                @forelse($rtypes as $rtype)
                                    <option hidden class="sala" value="{{$rtype->name}}">{{$rtype->name}}</option>
                                @empty
                                    <option value="">--</option>
                                @endforelse
                                @forelse($rtypes_instrument as $rtype)
                                    <option hidden class="instrumento"
                                            value="{{$rtype->name}}">{{$rtype->name}}</option>
                                @empty
                                    <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="mainCharacteristic">Característica</label>
                        <div class="col-lg-9">
                            <select name="rcaracteristic" id="mainCharacteristic" class="form-control" size="0"
                                    name="mainCharacteristic">
                                <option value=""></option>
                                @forelse($rcaracteristics as $rcaracteristic)
                                    <option hidden class="sala"
                                            value="{{$rcaracteristic->name}}">{{$rcaracteristic->name}}</option>
                                @empty
                                    <option value="">--</option>
                                @endforelse
                                @forelse($rcaracteristics_instrument as $rcaracteristic)
                                    <option hidden class="instrumento"
                                            value="{{$rcaracteristic->name}}">{{$rcaracteristic->name}}</option>
                                @empty
                                    <option value="">--</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div id="options" name="options">

                        <div id="char_1" class="row d-flex flex-row justify-content-center">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="option" class="form-control" size="0" name="option">
                                        <option value="and">AND</option>
                                        <option value="or">OR</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="aditionalCharacteristic" class="form-control" size="0"
                                            name="mainCharacteristic">
                                        <option value=""></option>
                                        @forelse($rcaracteristics as $rcaracteristic)
                                            <option hidden class="sala"
                                                    value="{{$rcaracteristic->name}}">{{$rcaracteristic->name}}</option>
                                        @empty
                                            <option value="">--</option>
                                        @endforelse
                                        @forelse($rcaracteristics_instrument as $rcaracteristic)
                                            <option hidden class="instrumento"
                                                    value="{{$rcaracteristic->name}}">{{$rcaracteristic->name}}</option>
                                        @empty
                                            <option value="">--</option>
                                        @endforelse
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-xs-100">
                                    <div class="d-flex align-items-center mx-auto">
                                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                           href="#" onclick="addCaracteristic()">Añadir</a>
                                    </div>
                                </div>
                                <div class="form-group col-xs-100">
                                    <div class="d-flex align-items-center mx-auto">
                                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                           href="#" onclick="delCaracteristic(this)">Borrar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <a class="btn btn-dark js-scroll-trigger space" href="#"
                           onclick="event.preventDefault(); document.getElementById('search_resource').submit();">Buscar</a>
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
