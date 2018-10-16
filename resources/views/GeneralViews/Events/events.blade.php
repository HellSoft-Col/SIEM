@extends('layouts.layout')
@section('includes')
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel="stylesheet" href="{{ asset('/css/eventFeedGeneral/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/eventFeedGeneral/view.css') }}">
    <style class="cp-pen-styles">#carousel3d .carousel-3d-slide {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            background-color: #fff;
            padding: 10px;
            -webkit-transition: all .4s;
            transition: all .4s;
        }
        #carousel3d .carousel-3d-slide.current {
            background-color: #333;
            color: #fff;
        }
        #carousel3d .carousel-3d-slide.current span {
            font-size: 20px;
            font-weight: 500;
        }
    </style>
@endsection
@section('content')
    <h1 class=" title-margin text-center my-3">Eventos</h1>
    <!--  -->
    <div class="container " >

        <div id="carousel3d" class="crouselpro">
            <carousel-3d :width="300" :height="400" :perspective="0" :space="200" :display="5" :controls-visible="true" :controls-prev-html="'❬'" :controls-next-html="'❭'" :controls-width="30" :controls-height="60" :clickable="true" :autoplay="true" :autoplay-timeout="5000">
                <slide :index="0">
                    <a href="#" class="pop">
                        <img src="{{asset('/img/event_oboe_fagot.jpg')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
                <slide :index="1">
                    <a href="#" class="pop">
                        <img src=" {{asset('/img/event_piano.jpg')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
                <slide :index="2">
                    <a href="#" class="pop">
                        <img src="{{asset('/img/event_percusion.jpg')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
                <slide :index="3">
                    <a href="#" class="pop">
                        <img src="{{asset('/img/event_oboe.jpg')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
                <slide :index="4">
                    <a href="#" class="pop">
                        <img src="{{asset('/img/event_estelares.jpg')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
                <slide :index="5">
                    <a href="#" class="pop">
                        <img src="{{asset('/img/event_previsiones.png')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
                <slide :index="6">
                    <a href="#" class="pop">
                        <img src="{{asset('/img/event_conferencia.png')}}" style="width:100%;max-width:300px">
                    </a>
                </slide>
            </carousel-3d>

        </div>

        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js'></script>
        <script src='https://rawgit.com/Wlada/vue-carousel-3d/master/dist/vue-carousel-3d.min.js'></script>
        <script >new Vue({
                el: '#carousel3d',
                data: {
                    slides: 7
                },
                components: {
                    'carousel-3d': Carousel3d.Carousel3d,
                    'slide': Carousel3d.Slide
                }
            })
            //# sourceURL=pen.js
        </script>
        <div>
            <div class="row row-striped">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary">23</span></h1>
                    <h2>OCT</h2>
                </div>
                <div class="col-10">
                    <h3 class="text-uppercase"><strong>Ice Cream Social</strong></h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Cafe</li>
                    </ul>
                    <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="row row-striped">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary">27</span></h1>
                    <h2>OCT</h2>
                </div>
                <div class="col-10">
                    <h3 class="text-uppercase"><strong>Operations Meeting</strong></h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Friday</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 2:30 PM - 4:00 PM</li>
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room 4019</li>
                    </ul>
                    <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <img src="" class="imagepreview" style="width: 100%;" >
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('/js/eventsFeedsGeneral/behavior.js') }}" type="text/javascript"></script>
@endsection