<h1 class=" title-margin-reverse space text-center ">{{ $resource->name }}</h1>

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
        <form id="reservar_button" class="form" role="form" method="GET"
              action="{{url('/resource/view/'.$resource->id.'/reservations')}}">
            @csrf
            <input type="hidden" name="_resource" value="{{$resource->id}}">
            <div class="d-flex flex-row justify-content-center">
                <a class="btn btn-dark js-scroll-trigger space-btn" href="#"
                   onclick="event.preventDefault(); document.getElementById('reservar_button').submit();">Reservar</a>
            </div>
        </form>

    </div>

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
        //# sourceURL=pen.js
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
    <ul>
    @foreach($reservations as $r)
        <li>{{$r['name']}}
        <p>{{$r['nameUser']}}</p>
        <p>{{$r['startTime']}}</p>
        <p>{{$r['endTime']}}</p>
        </li>
    @endforeach
    </ul>
</div>
