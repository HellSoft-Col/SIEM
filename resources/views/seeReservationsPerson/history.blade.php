@extends('layout')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1> Mis reservas </h1>
    <form method="GET" action="{{url('person/reservation/history')}}">
        <input type="radio" name="Activas" > Activas
        <input type="radio" name="Historial" checked="checked"> Historial
    </form>
    <h2>Historial</h2>
    <ul>
        <form method="GET" action="{{url('person/reservation/history/{startTime}/{endTime}')}}">
            {{csrf_field()}}
            <label >Fecha inicio</label>
            <br>
            <input type="date" name="startTime" value="{{old('startTime')}}">
            <br>
            <label >Fecha fin</label>
            <br>
            <input type="date" name="endTime" value="{{old('startTime')}}">
            <button>Buscar</button>
        </form>
        @foreach($reservations as $reservation)
            <li>{{$reservation['imagePath']}}, {{$reservation['name']}},
                {{$reservation['salon']}}, {{$reservation['inicio']}},
                {{$reservation['fin']}}</li>
        @endforeach
    </ul>
@endsection