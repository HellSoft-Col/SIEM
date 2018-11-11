@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Instrumentos</h2>
                </div>
            </div>
        </div>
        <hr>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                   value="{{url('/reservation/view/resources/instrument/' . $user->id)}}" checked>
                            Instrumentos
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                   value="{{url('/reservation/view/resources/classroom/' . $user->id)}}">
                            Salones
                        </label>
                    </div>
                </div>
            </div>
        </form>

        <script>
            $('input[type="radio"]').on('click', function () {
                window.location = $(this).val();
            });
        </script>
        <br>

        <div class="container-list">
            <ul class="list-unstyled">

                @if (!empty($resources))
                    @foreach($resources as $resource)
                        <li class="media my-4">
                            <div class="col-md-4">
                                @foreach($resource->files as $file)
                                    <img class="mr-3" src="{{asset($file->path)}}"
                                         alt="Generic placeholder image" style="with:290px;height:171px;">
                                    @break
                                @endforeach
                            </div>
                            <div class=" media-body d-flex align-items-center">
                                <div class="row">
                                    <div class="col text-center">
                                        <h5 class="mt-0 mb-1">{{$resource->name}}</h5>
                                        <p class="container-description mr-auto">{{$resource->description}}</p>
                                    </div>
                                </div>
                                <div class="col d-flex mx-auto col-auto d-flex ">
                                    <div class="col d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="d-flex align-items-center flex-column">
                                                <button type="submit"
                                                        class="btn btn-dark d-flex align-items-center btn-sm m-1"
                                                        href="#" value="{{URL::to('/')}}/calendar/{{$resource->id}}"
                                                        onclick="updateCalendar(this.value)">Disponibilidad
                                                </button>

                                                <form id="reservar_button" class="form" role="form" method="POST"
                                                      action="{{ route('create.reservation') }}">
                                                    @csrf
                                                    <input type="hidden" name="_user" value="{{ $user->id }}">
                                                    <input type="hidden" name="_resource" value="{{$resource->id}}">
                                                    <button type="submit"
                                                            class="btn btn-dark d-flex align-items-center btn-sm m-1"
                                                            href="#">Hacer Reserva
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <h1>No hay reursos registrados</h1>
                @endif

            </ul>
        </div>
    </div>

    <div id="calendar_incrust">

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('/js/reservations/availability.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/js/date/date.js') }}" type="text/javascript"></script>
@endsection
