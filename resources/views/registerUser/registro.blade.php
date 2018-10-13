@extends('layout')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1> Registrarse </h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection