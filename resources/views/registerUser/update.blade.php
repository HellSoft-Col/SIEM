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
    <form enctype="multipart/form-data" action="" method="POST">
        {{csrf_field()}}
        <input name="uploadedfile" type="file" />
        <input type="submit" value="Subir archivo" />
    </form>
    <form method="POST" action="{{url("user/update/profile/{$user->id}")}}">
        {{csrf_field()}}
        <label>Nombres</label>
        <br>
        <input type="text" name="name" value="{{old('name')}}">
        <br>
        <label>Apellidos</label>
        <br>
        <input type="text" name="lastName" value="{{old('lastName')}}">
        <br>
        <label>Useranme</label>
        <br>
        <input type="text" name="username" value="{{old('username')}}">
        <br>
        <label>Cedula</label>
        <br>
        <input type="text" name="cedula" value="{{old('cedula')}}">
        <br>
        <label>ID</label>
        <br>
        <input type="text" name="identification" value="{{old('identification')}}">
        <br>
        <label>Semestre</label>
        <br>
        <input type="text" name="semester" value="{{old('semester')}}">
        <br>
        <label>Tipo</label>
        <br>
        <input type="text" name="tipo" value="{{old('tipo')}}">
        <br>
        <br>
        <button type="submit">Crear</button>
    </form>
@endsection