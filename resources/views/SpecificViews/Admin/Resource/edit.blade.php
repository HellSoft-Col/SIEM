@extends('layouts.layout_user')

@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/resourceStyle/content.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/resourceStyle/create/style.css') }}">
@endsection
@section('content')

    <div class="container">

        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Editar recurso</h3>
            </div>
            <div class="card-body">

                <br>
                <form id="search_resource" class="form" role="form" method="POST"
                      action="{{ url('/admin/resource/edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="id" value="{{$resource->id}}">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="name">Nombre</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nombre del recurso" id="name"
                                       name="name" value="{{ $resource->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="rtype">Detalle de recurso</label>
                        <div class="col-lg-9">
                            <select onchange="onChangeEvent()" id="rtype" class="form-control" size="0" name="rtype">
                                <option value="0" disabled hidden>Seleccione algo</option>
                                @forelse($types as $type)
                                    <option
                                        value="{{ $type->id }}" {{ $type->id == $resource->resource_type->id ? ' selected' : '' }}>{{$type->name}}</option>
                                @empty
                                    <option value="0">No hay datos !</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="state">Estado del recuro</label>
                        <div class="col-lg-9">
                            <select onchange="onChangeEvent()" id="state" class="form-control" size="0" name="state">
                                <option value="0" disabled hidden>Seleccione algo</option>
                                <option value="AVAILABLE" {{ 'AVAILABLE' == $resource->state ? ' selected' : '' }}>
                                    Disponible
                                </option>
                                <option value="DAMAGED" {{ 'DAMAGED' == $resource->state ? ' selected' : '' }}>Dañado
                                </option>
                                <option
                                    value="IN_MAINTENANCE" {{ 'IN_MAINTENANCE' == $resource->state ? ' selected' : '' }}>
                                    En mantenimiento
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label" for="description">Descripcion</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input placeholder="Introduce una descripcion sobre el recurso" type="text"
                                       class="form-control" id="description" name="description"
                                       value="{{ $resource->description }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-lg-2 col-form-label form-control-label" for="img">Imagenes</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input class="form-control-file {{ $errors->has('img') ? ' is-invalid' : '' }}"
                                       type="file" id="img" name="images[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div id="options" name="options">
                        <label class="col-lg-2 col-form-label form-control-label"
                               for="char_1">Características</label>

                        @forelse($resource->characteristics as $characteristic)

                            <div id="char_{{$loop->iteration + 100}}" name="char_{{$loop->iteration + 100}}">

                                <div id="char_{{$loop->iteration + 100}}"
                                     class="row d-flex flex-row justify-content-center">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input id="quantity{{ $loop->iteration > 1 ?  $loop->iteration + 100: ''}}"
                                                   name="quantity{{ $loop->iteration > 1 ?  $loop->iteration + 100: ''}}"
                                                   class="form-control"
                                                   placeholder="cantidad"
                                                   value="1">
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select
                                                id="aditionalCharacteristic{{ $loop->iteration > 1 ?  $loop->iteration + 100: ''}}"
                                                class="form-control" size="0"
                                                name="aditionalCharacteristic{{ $loop->iteration > 1 ?  $loop->iteration +100: ''}}">
                                                <option value="0" selected disabled hidden>Seleccione algo</option>
                                                @forelse($rcharacteristics as $rcaracteristic)
                                                    <option
                                                        value="{{ $rcaracteristic->id }}" {{ $rcaracteristic->id === $characteristic->id ? ' selected' : '' }}>{{$rcaracteristic->name}}</option>
                                                @empty
                                                    <option value="0" selected disabled hidden>Seleccione algo</option>
                                                @endforelse

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="form-group col">
                                            <div class="d-flex align-items-center mx-auto">
                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                                   style="margin-right: 10px; color: white;"
                                                   onclick="addCaracteristic()">+</a>

                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                                   style="margin-right: 10px; color: white;"
                                                   onclick="delCaracteristic(this)">-</a>

                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                                   style="color: white;" onclick="addNewCaracteristic(this)">Otra</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @empty
                            <div id="char_1" name="char_1">

                                <div id="char_1" class="row d-flex flex-row justify-content-center">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input id="quantity" name="quantity" class="form-control"
                                                   placeholder="cantidad"
                                                   value="1">
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select id="aditionalCharacteristic" class="form-control" size="0"
                                                    name="aditionalCharacteristic">
                                                <option value="0" selected disabled hidden>Seleccione algo</option>
                                                @forelse($rcharacteristics as $rcaracteristic)
                                                    <option
                                                        value="{{ $rcaracteristic->id }}">{{$rcaracteristic->name}}</option>
                                                @empty
                                                    <option value="0" selected disabled hidden>Seleccione algo</option>
                                                @endforelse

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="form-group col">
                                            <div class="d-flex align-items-center mx-auto">
                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                                   style="margin-right: 10px; color: white;"
                                                   onclick="addCaracteristic()">+</a>

                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                                   style="margin-right: 10px; color: white;"
                                                   onclick="delCaracteristic(this)">-</a>

                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                                                   style="color: white;" onclick="addNewCaracteristic(this)">Otra</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforelse
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Editar</button>

                </form>
            </div>
        </div>

    </div>

    <div class="hidden" id="char_1" name="char_1">

        <div id="char_1" class="row d-flex flex-row justify-content-center">
            <div class="col-sm-2">
                <div class="form-group">
                    <input id="quantity" name="quantity" class="form-control"
                           placeholder="cantidad"
                           value="1">
                </div>

            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <select id="aditionalCharacteristic" class="form-control" size="0"
                            name="aditionalCharacteristic">
                        <option value="0" selected disabled hidden>Seleccione algo</option>
                        @forelse($rcharacteristics as $rcaracteristic)
                            <option
                                value="{{ $rcaracteristic->id }}">{{$rcaracteristic->name}}</option>
                        @empty
                            <option value="0" selected disabled hidden>Seleccione algo</option>
                        @endforelse

                    </select>
                </div>

            </div>
            <div class="row d-flex justify-content-end">
                <div class="form-group col">
                    <div class="d-flex align-items-center mx-auto">
                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                           style="margin-right: 10px; color: white;"
                           onclick="addCaracteristic()">+</a>

                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                           style="margin-right: 10px; color: white;"
                           onclick="delCaracteristic(this)">-</a>

                        <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger"
                           style="color: white;" onclick="addNewCaracteristic(this)">Otra</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div id="char_nueva" class="row d-flex flex-row justify-content-center hidden">
        <div class="col-sm-2">
            <div class="form-group">
                <input id="quantity" name="quantity" class="form-control" placeholder="cantidad" value="1">
            </div>

        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombre de la caracteristica"
                       id="aditionalCharacteristic"
                       name="aditionalCharacteristic">
            </div>

        </div>
        <div class="row d-flex justify-content-end">
            <div class="form-group col">
                <div class="d-flex align-items-center mx-auto">
                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger but_color"
                       style="margin-right: 10px; color: white;" onclick="addCaracteristic()">+</a>

                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger but_color"
                       style="margin-right: 10px; color: white;" onclick="delCaracteristic2(this)">-</a>

                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger but_color" style="color: white;"
                       onclick="addNewCaracteristic()">Otra</a>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/resource/create/script.js') }}" type="text/javascript"></script>
@endsection

