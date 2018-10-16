@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('options')
    <a class="dropdown-item" href="#">Publicaciones</a>
    <a class="dropdown-item" href="#">Eventos</a>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Mis reservas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                               checked>Activas
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Historial
                    </label>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm">
                <div class="form-check" for="checkAll">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="checkAll" name="check" value="all">
                        Seleccionar todas
                    </label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="d-flex align-items-right mx-auto">
                    <a class="btn btn-dark d-flex align-items-right js-scroll-trigger" href="#">Cancelar reservas
                        seleccionadas</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="container-list">
            <ul class="list-unstyled">
                <li class="media my-6">
                    <div class="d-flex align-items-center mx-auto">
                        <div class="form-check col-2" for="checkOne">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="checkOne" name="check_one"
                                       value="one">
                            </label>
                        </div>
                    </div>
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="media my-6">
                    <div class="d-flex align-items-center mx-auto">
                        <div class="form-check col-2" for="checkOne">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="checkOne" name="check_one"
                                       value="one">
                            </label>
                        </div>
                    </div>
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="media my-6">
                    <div class="d-flex align-items-center mx-auto">
                        <div class="form-check col-2" for="checkOne">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="checkOne" name="check_one"
                                       value="one">
                            </label>
                        </div>
                    </div>
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="media my-6">
                    <div class="d-flex align-items-center mx-auto">
                        <div class="form-check col-2" for="checkOne">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="checkOne" name="check_one"
                                       value="one">
                            </label>
                        </div>
                    </div>
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="media my-6">
                    <div class="d-flex align-items-center mx-auto">
                        <div class="form-check col-2" for="checkOne">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="checkOne" name="check_one"
                                       value="one">
                            </label>
                        </div>
                    </div>
                    <div class="media-body d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-0 mb-1">Sala 2</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                    <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                        recurso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection
