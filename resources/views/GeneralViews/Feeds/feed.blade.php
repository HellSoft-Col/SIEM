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

    <form method="POST" action="{{ url('feed') }}">
        @csrf
        <h1 class=" title-margin text-center my-3">Publicaciones</h1>
        <div class="container">
            <form method="GET" action="{{url('/feed')}}">
            <div class="row">
                <div class="col">
                    <label>Palabra clave:</label>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input name="keyword" type="text" class="form-control" placeholder="Palabra clave">
                        <div class="input-group-append">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <label>Fecha Inicio - Fecha Fin:</label>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepickerStart" data-target-input="nearest">
                            <input name="start_date" type="text" class="form-control datetimepicker-input"
                                   data-target="#datetimepickerStart"/>
                            <div class="input-group-append" data-target="#datetimepickerStart"
                                 data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <label>-</label>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepickerStart" data-target-input="nearest">
                            <input name="end_date" type="text" class="form-control datetimepicker-input"
                                   data-target="#datetimepickerStart"/>
                            <div class="input-group-append" data-target="#datetimepickerStart"
                                 data-toggle="datetimepicker">
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
                <div class="col">
                    <button class="btn btn-dark d-flex align-self-center js-scroll-trigger">Buscar</button>
                </div>

            </div>
            </form>
        </div>
    </form>

    <section id="posts">
        @php($x = 0)

        @foreach($publications as $publication)
            @foreach($publication->files as $file)
                <a href="#" title="{{ $publication->header }}" class="post pop" data-toggle="modal"
                   data-target="#{{ 'id' . ((string) $x) }}" style="background-image: url('{{ $file->path }}');">
                    <h2>{{ $publication->header }}</h2>
                    <p class="lead">{{ $publication->user->name }}</p></a>
                @php($x+=1)
                @break
            @endforeach
        @endforeach
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

    @php($i=0)
    @foreach($publications as $publication)
        <div class="modal fade product_view" id="{{ 'id' . ((string) $i) }}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" data-dismiss="modal" class="pull-right"><span class="fa fa-times"></span></a>
                            <h3 class="modal-title">{{ $publication->header }}</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="mini-carousel">
                                    <ul class="mini-item">
                                        @foreach($publication->files as $file)
                                            <li><a href="#" title="{{ $file->description }}"> <img
                                                        src="{{asset($file->path)}}"
                                                        style="width:100%;max-width:300px;"
                                                        alt="{{ $file->description }}"></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="carousel zoom">
                                    <div class="image-large">
                                        <ul>
                                            @php($j = 0 )
                                            @foreach($publication->files as $file)
                                                <li><img src="{{asset($file->path)}}"
                                                         style="width:100%;max-width:300px; {{ $j == 0 ? ' background-position: center;' : '' }}">
                                                </li>
                                                @php($j+=1)
                                            @endforeach
                                        </ul>
                                        <a href="#" class="prev fa fa-chevron-left"></a>
                                        <a href="#" class="next fa fa-chevron-right"></a>
                                    </div>
                                </div>
                                <div class="detail">
                                    <div class="post-details">
                                        <h3 class="author-name">{{ $publication->user->name }}</h3>
                                        <h5 class="post-description">{{ $publication->description }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php($i+=1)
    @endforeach

@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/js/eventsFeedsGeneral/behavior.js') }}" type="text/javascript"></script>
@endsection
