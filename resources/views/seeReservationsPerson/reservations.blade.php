@extends('layout')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1> Mis reservas </h1>
    <form method="GET" action="{{url('person/reservation/active')}}">
        <input type="radio" name="Activas" checked="checked"> Activas
        <input type="radio" name="Historial" > Historial
    </form>
    <h2>Activas</h2>
    <form method="POST" action="{{url('/person/reservation/delete')}}">
        {{csrf_field()}}
        <input type="checkbox" name="all[]"> Seleccionar todas <br>
        @foreach($reservations as $reservation)
            <input type="checkbox" name="selected[]" value="{{$reservation['id']}}">
                {{$reservation['name']}}, {{$reservation['salon']}},
                {{$reservation['inicio']}}, {{$reservation['fin']}} <br>
        @endforeach
        <button>Cancelar reservas seleccionadas</button>
    </form>
@endsection