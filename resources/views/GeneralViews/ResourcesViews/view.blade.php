@extends('layouts.layout_user')
@section('includes')
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/eventFeedGeneral/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/eventFeedGeneral/view.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/calendar/calendar.css') }}">

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

    <h1 class=" title-margin-reverse space text-center " style="margin-top: 50px;">{{ $resource->name }}</h1>

    <div class="container ">
        <div id="carousel3d" class="crouselpro">
            <carousel-3d :width="300" :height="400" :perspective="0" :space="200" :display="5" :controls-visible="true"
                         :controls-prev-html="'❬'" :controls-next-html="'❭'" :controls-width="30" :controls-height="60"
                         :clickable="true" :autoplay="true" :autoplay-timeout="5000">

                @php($i = 0)
                @foreach($resource->files as $file)
                    <slide :index="{{ $i }}">
                        @php($i+=1)
                        <a href="#" class="pop">

                            <img src="{!! asset($file->path) !!}" style="width:100%;max-width:300px">
                        </a>
                    </slide>
                @endforeach

            </carousel-3d>
            <p class="text-center">{{ $resource->description }}</p>
            <form id="reservar_button" class="form" role="form" method="POST"
                  action="{{ route('create.reservation') }}">
                @csrf
                <input type="hidden" name="_resource" value="{{$resource->id}}">
                @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'MODERATOR' )
                <div class="d-flex flex-row justify-content-center">
                    <a class="btn btn-dark js-scroll-trigger space-btn" href="#"
                       onclick="event.preventDefault(); document.getElementById('reservar_button').submit();">Ver reservas</a>
                </div>
                @endif
                <div class="d-flex flex-row justify-content-center">
                    <a class="btn btn-dark js-scroll-trigger space-btn" href="#"
                       onclick="event.preventDefault(); document.getElementById('reservar_button').submit();">Reservar</a>
                </div>
            </form>

        </div>


        <div class="row" style="margin-bottom: 70px; margin-top: 70px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $calendar_details->calendar() !!}
                </div>
            </div>
        </div>


    </div>



@endsection
@section('scripts')
    <script
        src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js'></script>
    <script src='https://rawgit.com/Wlada/vue-carousel-3d/master/dist/vue-carousel-3d.min.js'></script>

    <script>new Vue({
            el: '#carousel3d',
            data: {
                slides: {{ $resource->files->count() }}
            },
            components: {
                'carousel-3d': Carousel3d.Carousel3d,
                'slide': Carousel3d.Slide
            }
        })
    </script>
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>

                    <img src="" class="imagepreview" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/eventsFeedsGeneral/behavior.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar_details->script() !!}

    <script src="{{ asset('js/fullcalendar/all.js') }}"></script>
    <script>

        $(document).ready(function () {
            $('#calendar-'{{ $calendar_details->getId()}}).fullCalendar('option', 'locale', 'es');
        });

    </script>


@endsection
