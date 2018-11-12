@extends('layouts.layout_user')

@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>

    <link rel="stylesheet" href="{{ asset('/css/resourceStyle/content.css') }}">
@endsection
@section('content')

    <div class="container">

        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Añadir nuevo recurso</h3>
            </div>
            <div class="card-body">

                <form class="text-center" id="type_resource">
                    <div class="row">

                        <div class="col-sm">
                            <label>Tipo : </label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                           value="{{url('/admin/resource/create/classroom')}}"
                                           checked> Sala
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                           value="{{url('/admin/resource/create/instrument')}}"> Instrumento
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <form id="search_resource" class="form" role="form" method="POST"
                      action="{{ url('/admin/resource/create/sala') }}">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="name">Nombre</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nombre del recurso" id="name"
                                       name="name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="rtype">Tipo de recurso</label>
                        <div class="col-lg-9">
                            <select onchange="onChangeEvent()" id="rtype" class="form-control" size="0"
                                    name="rcategory">
                                <option value="0"> ---</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="description">Descripcion</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input placeholder="Introduce una descripcion sobre el recurso" type="text"
                                       class="form-control" id="description" name="description">
                            </div>
                        </div>
                    </div>


                    <label class="col-lg-2 col-form-label form-control-label"
                           for="characteristic_1">Características</label>

                    <div id="characteristic_1" name="characteristic_1">

                        <div id="char_1" class="row d-flex flex-row justify-content-center">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input id="quantity" name="quantity" class="form-control" placeholder="cantidad">
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="aditionalCharacteristic" class="form-control" size="0"
                                            name="mainCharacteristic">
                                        <option value=""></option>

                                    </select>
                                </div>

                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="form-group col">
                                    <div class="d-flex align-items-center mx-auto">
                                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                           href="#" style="margin-right: 10px;" onclick="addCaracteristic()">+</a>

                                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                           href="#" onclick="delCaracteristic(this)">-</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <label class="col-lg-2 col-form-label form-control-label" for="files">Fotos</label>

                    <div id="files" name="files">

                        <div id="char_1" class="row d-flex flex-row justify-content-center">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input class="form-control-file {{ $errors->has('img') ? ' is-invalid' : '' }}"
                                           type="file" id="img"
                                           name="img">
                                </div>

                            </div>

                            <div class="row d-flex justify-content-end">
                                <div class="form-group col">
                                    <div class="d-flex align-items-center mx-auto">
                                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                           href="#" style="margin-right: 10px;" onclick="addCaracteristic()">+</a>

                                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                           href="#" onclick="delCaracteristic(this)">-</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Crear</button>

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

