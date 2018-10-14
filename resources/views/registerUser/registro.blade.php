@extends('layout')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1> Registrarse </h1>

    @if ($errors->any())
        <ul>@foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{url('user/create/store')}}">
        {{ method_field('PUT') }}{{csrf_field()}}
        <label>Correo Institucional</label>
        <br>
        <input type="text" name="email" value="{{old('email')}}">
        <br>
        <label>Confirmar Correo</label>
        <br>
        <input type="text" name="confirmEmail">
        <br>
        <label>Contraseña</label> <label>Confirmar Contraseña</label>
        <br>
        <input type="password" name="password">
        <input type="password" name="confirmPassword">
        <br>
        <br>
        <button type="submit">Crear cuenta</button>
    </form>
@endsection