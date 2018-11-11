@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="container result">
        <div class="col-lg-11">
            <div class="d-flex flex-row justify-content-start">
                <h2 class="title-margin">Publicaciones de Andrés Cocunubo</h2>
            </div>
        </div>
        <hr>
        <table class="table table-bordered" id="myTable">
            <tbody>
            <thead class="thead-dark">
            <tr class="text-center">
                <th>Título</th>
                <th>Fecha de publicación</th>
            </tr>
            </thead>
            <tr class="clickable-row text-center">
                <th>Misa Re-menor</th>
                <th>2018-09-20 16:00</th>
            </tr>
            <tr class="clickable-row text-center">
                <th>Misa Re-menor</th>
                <th>2018-09-20 16:00</th>
            </tr>
            <tr class="clickable-row text-center">
                <th>Misa Re-menor</th>
                <th>2018-09-20 16:00</th>
            </tr>
            <tr class="clickable-row text-center">
                <th>Misa Re-menor</th>
                <th>2018-09-20 16:00</th>
            </tr>
            </tbody>
        </table>
        <script type="text/javascript">
            $(function () {
                $('#myTable').on('click', '.clickable-row', function (event) {
                    $(this).addClass('bg-info').siblings().removeClass('bg-info');
                });
            });
        </script>
        <div class="row d-flex justify-content-center" style="margin-top: 50px;">
            <div class="col-lg-3">
                <button class="btn btn-dark btn-lg" type="button" data-toggle="modal"
                        data-target=".bd-example-modal-lg">Ver publicación
                </button>
            </div>
            <div class="col-lg-3">
                <button class="btn btn-dark btn-lg" type="button" data-toggle="modal" data-target="#deleteModal">
                    Eliminar
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Misa Re-menor</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4 d-flex justify-content-end">
                                <img src="{{asset('/img/andres.PNG')}}" alt="Generic placeholder image"
                                     class="w-25 rounded-circle">
                                <br><h4 class="d-flex align-items-center ml-4">Andrés Cocunubo</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="container details">
                            <p><span class="fa fa-file-text" style="width:50px;"></span> Concierto procede del verbo
                                concertar (componer, ordenar, ajustar).
                                Puede tratarse del convenio entre dos o más personas o entidades sobre algún asunto: “La
                                intención del gobierno es llegar a un
                                gran concierto social con la participación de diversos actores”,
                                “El concierto económico fracasó y no pudo evitar la intensificación de la crisis”.</p>
                        </div>
                        <div id="demo" class="carousel slide w-75 m-auto" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('/img/sala_test.jpg')}}" alt="Los Angeles">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('/img/sala_test.jpg')}}" alt="Chicago">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('/img/sala_test.jpg')}}" alt="New York">
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmación de eliminación</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Esta seguro de eliminar esta publicación?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
