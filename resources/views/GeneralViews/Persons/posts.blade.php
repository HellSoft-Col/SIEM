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
                <h2 class="title-margin">Publicaciones de {{$user->name}}</h2>
            </div>
        </div>
        <hr>
        <table class="table table-bordered" id="myTable">
            <thead class="thead-dark">
            <tr class="text-center">
                <th>Título</th>
                <th>Fecha de publicación</th>
            </tr>
            </thead>
            <tbody>

            @foreach($user_posts as $post)
                <tr class="clickable-row text-center">
                    <th>{{ $post->header }}</th>
                    <th>{{ $post->date_time }}</th>
                    <th hidden>{{ $post->id }}</th>
                </tr>
            @endforeach

            </tbody>
        </table>


        <script type="text/javascript">
            $(function () {
                $('#myTable').on('click', '.clickable-row', function (event) {
                    $(this).addClass('bg-info').siblings().removeClass('bg-info');
                    $('#boton_1').attr('data-target', '#mymodal' + this.cells[2].innerHTML);
                });

            });
        </script>
        <div class="row d-flex justify-content-center" style="margin-top: 50px;">
            <div class="col-lg-3">
                <button id="boton_1" class="btn btn-dark btn-lg" type="button" data-toggle="modal"
                        data-target="#mymodal6">Ver publicación
                </button>
            </div>

        </div>


    @foreach($user_posts as $post)
        <!-- Modal -->
            <div class="modal fade product_view" tabindex="-1" role="dialog" id="mymodal{{$post->id}}">
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
                                    <img src="{{asset($post->user->file->path)}}" alt="Generic placeholder image"
                                         class="w-25 rounded-circle">
                                    <br><h4 class="d-flex align-items-center ml-4">{{ $post->user->name }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="container details">
                                <p><span class="fa fa-file-text" style="width:50px;"></span> {{ $post->description }}
                                </p>
                            </div>
                            <div id="demo" class="carousel slide w-75 m-auto" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    @foreach($post->files as $file)
                                        <li data-target="#demo" data-slide-to="{{ $loop->iteration -1 }}"
                                            class="active"></li>
                                    @endforeach
                                </ul>
                                <div class="carousel-inner">
                                    @foreach($post->files as $file)
                                        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                            <img src="{{asset($file->path)}}">
                                        </div>
                                    @endforeach
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

        @endforeach


    </div>
@endsection
