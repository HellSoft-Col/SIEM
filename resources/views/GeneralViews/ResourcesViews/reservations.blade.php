
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Reservas {{$resource['name']}}</h2>
                </div>
            </div>
        </div>
        <hr>
        <form method="POST" action="{{url('/resource/deleteReservations')}}">
            {{csrf_field()}}
            <input hidden value="{{$resource['id']}}" name="id">
            <div class="row">
                <div class="col-sm">
                    <div class="form-check" for="checkAll">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="checkAll" name="all[]" value="all">
                            Seleccionar todas
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="d-flex align-items-right mx-auto">
                        <button class="btn btn-dark d-flex align-items-right js-scroll-trigger" >Cancelar reservas
                            seleccionadas</button>
                    </div>
                </div>
            </div>
        <hr>
        <div class="container-list">
            <ul class="list-unstyled">
                @if (!empty($reservations))
                        @foreach($reservations as $reservation)
                            <li class="media my-6">
                                <div class="col-sm-3 d-flex align-items-center mx-auto">
                                    <div class="form-check col-2" for="checkOne">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="checkOne" name="selected[]"
                                                   value="{{$reservation['id']}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="media-body d-flex align-items-center">
                                    <div class="row flexcontainer">
                                        <div class="col itemcenter">
                                            <h5 class="mt-0 mb-1">{{$reservation['name']}}</h5>
                                            <p>{{$reservation['nameUser']}}<br>{{$reservation['startTime']}}<br>{{$reservation['endTime']}}</p>
                                        </div>
                                        <div class="col-3 itemright d-flex align-items-center">
                                            <div class="d-flex align-items-center mx-auto">
                                                <a class="btn btn-dark d-flex align-items-cente js-scroll-trigger" href="#">Ver
                                                    recurso</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </form>
                @else
                    <h1>El recurso no posee reservas activas en el momento.</h1>
                @endif
            </ul>
        </div>
    </div>


