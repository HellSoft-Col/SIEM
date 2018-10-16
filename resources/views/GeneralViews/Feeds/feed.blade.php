@extends('layouts.layout')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/eventFeedGeneral/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/eventFeedGeneral/view.css') }}">
@endsection
@section('content')
    <h1 class=" title-margin text-center my-3">Publicaciones</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <label>Palabra clave:</label>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this blog">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col">
                <label>Fecha Inicio - Hora Inicio:</label>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="input-group date" id="datetimepickerStart" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                               data-target="#datetimepickerStart"/>
                        <div class="input-group-append" data-target="#datetimepickerStart" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepickerStart').datetimepicker();
                });
            </script>
        </div>


    </div>

    <section id="posts">

        <a href="#" title="A title of a page here" class="post pop" data-toggle="modal" data-target="#id1"
           style="background-image: url('{{asset('/img/post3.jpg')}}');"><h2>Concierto Percusión</h2>
            <p class="lead">Andrés Cocunubo</p></a>
        <a href="#" title="A title of a page here" class="post pop"
           style="background-image: url('{{asset('/img/post_violin.jpg')}}');"><h2>El violin una pasión</h2>
            <p class="lead">María Pérez</p></a>
        <a href="#" title="A title of a page here" class="post pop"
           style="background-image: url(https://placeimg.com/640/480/nature);"><h2>Another title on a post</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post pop"
           style="background-image: url(https://placeimg.com/640/480/people);"><h2>Posts are better with titles</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/tech);"><h2>Some titles are better than others</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/grayscale);"><h2>Titles can be long</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/sepia);"><h2>Short titles are a thing too</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/animals);"><h2>As long as they look different</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/tech);"><h2>Lorem ipsum sucks</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/animals);"><h2>A title of a page here</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/arch);"><h2>This post has a title</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/nature);"><h2>Another title on a post</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/people);"><h2>Posts are better with titles</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/tech);"><h2>Some titles are better than others</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/grayscale);"><h2>Titles can be long</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/sepia);"><h2>Short titles are a thing too</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/animals);"><h2>As long as they look different</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/tech);"><h2>Lorem ipsum sucks</h2>
            <p class="lead">By Author name</p></a>
        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/animals);"><h2>As long as they look different</h2>
            <p class="lead">By Author name</p></a>

        <a href="#" title="A title of a page here" class="post"
           style="background-image: url(https://placeimg.com/640/480/animals);"><h2>As long as they look different</h2>
            <p class="lead">By Author name</p></a>

    </section>

    <!-- Jay's Viewport Helper -->
    <div style="position:fixed;top:0;left:0;background-color:rgba(0,0,0,0.5);padding:10px;color:#fff;">
        <span class="hidden-sm-up">SIZE XS</span>
        <span class="hidden-xs-down hidden-md-up">SIZE SM</span>
        <span class="hidden-sm-down hidden-lg-up">SIZE MD</span>
        <span class="hidden-md-down hidden-xl-up">SIZE LG</span>
        <span class="hidden-lg-down">SIZE XL</span>
    </div>
    <!-- /Jay's Viewport Helper -->
    <div class="modal fade product_view" id="id1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="#" data-dismiss="modal" class="pull-right"><span class="fa fa-times"></span></a>
                        <h3 class="modal-title">Concierto percusión</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mini-carousel">
                                <ul class="mini-item">
                                    <li><a href="#" title="Image1-Small"> <img src="{{asset('/img/post1.jpg')}}"
                                                                               style="width:100%;max-width:300px;"
                                                                               alt="Product"></a></li>
                                    <li><a href="#" title="Image2-Small"><img src="{{asset('/img/post2.jpg')}}"
                                                                              style="width:100%;max-width:300px;"
                                                                              alt="image2-small"></a></li>
                                    <li><a href="#" title="Image3-Small"><img src="{{asset('/img/post3.jpg')}}"
                                                                              style="width:100%;max-width:300px;"
                                                                              alt="image3-small"></a></li>
                                    <li><a href="#" title="Image4-Small"><img src="{{asset('/img/post4.jpg')}}"
                                                                              style="width:100%;max-width:300px;"
                                                                              alt="image4-small"></a></li>
                                </ul>
                            </div>
                            <div class="carousel zoom">
                                <div class="image-large">
                                    <ul>
                                        <li><img src="{{asset('/img/post1.jpg')}}"
                                                 style="width:100%;max-width:300px;background-position: center; "
                                                 alt="Product" alt="image1-large"></li>
                                        <li><img src="{{asset('/img/post2.jpg')}}" style="width:100%;max-width:300px;">
                                        </li>
                                        <li><img src="{{asset('/img/post3.jpg')}}" style="width:100%;max-width:300px;">
                                        </li>
                                        <li><img src="{{asset('/img/post4.jpg')}}" style="width:100%;max-width:300px;">
                                        </li>
                                    </ul>
                                    <a href="#" class="prev fa fa-chevron-left"></a>
                                    <a href="#" class="next fa fa-chevron-right"></a>

                                </div>

                            </div>

                            <div class="detail">
                                <div class="post-details">
                                    <h3 class="author-name">Andres Cocunubo</h3>
                                    <h5 class="post-description">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                        metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate
                                        at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                        Donec lacinia congue felis in faucibus.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/js/eventsFeedsGeneral/behavior.js') }}" type="text/javascript"></script>
@endsection
