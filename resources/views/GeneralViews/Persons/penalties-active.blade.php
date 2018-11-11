@extends('layouts.layout_user')
@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/reserve/content.css') }}">
@endsection
@section('content')
    <div class="container">
        <a class="btn m-auto d-flex flex-row" href="{{url()->previous()}}"><i class="fa fa-arrow-circle-left fa-3x"></i></a>
        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="title-margin">Multas de {{$user['name']}}</h2>
                </div>
            </div>
        </div>
        <hr>
        <form>
            <div class="row">
                <div class="col-sm">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="{{url('/person/penalties/'.$user['id'].'/active')}}"
                                   checked>Activas
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="{{url('/person/penalties/'.$user['id'].'/history')}}">Historial
                        </label>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            $('input[type="radio"]').on('click', function() {
                window.location = $(this).val();
            });
        </script>
        <form method="POST" action="{{url('/person/penalty/conclude')}}">
            {{csrf_field()}}
            <input hidden value="{{$user['id']}}" name="id">
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
                        <button class="btn btn-dark d-flex align-items-right js-scroll-trigger" >Finalizar multas
                            seleccionadas</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-list">
                <ul class="list-unstyled">
                    @if (!empty($penalties))
                        @foreach($penalties as $penalty)
                            <li class="media my-6">
                                <div class="col-md-4">
                                    <div class="form-check col-2" for="checkOne">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="checkOne" name="selected[]"
                                                   value="{{$penalty['id']}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <h5 class="mt-0 mb-1">Multa {{$penalty['id']}}</h5>
                                            <p>Razón de la multa: {{$penalty['reason']}}<br>Fecha en que finaliza: {{$penalty['penalty_end']}}</p>
                                        </div>
                                        <div class="col-auto d-flex flex-column">
                                            <a class="btn btn-dark " href="">Ver recurso</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
        </form>
                     @else
                        <h1>El usuario no posee multas activas.</h1>
                    @endif
                </ul>
             </div>
    </div>
@endsection