@extends('layouts.layout_user')

@section('includes')
    <link rel="stylesheet" href="{{ asset('/css/register/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/User/update_profile.css') }}">
@endsection
@section('content')
    <br>
    <br>
    <br>
    <div class="container">
        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{route('user.update')}}">
            {!! csrf_field() !!}
            <h2>Actualización de perfil</h2>
            <div class="form-group">
                <label for="cedula" class="col-sm-3 control-label">Cedula</label>
                <div class="col-sm-9">
                    <input type="number" id="cedula" name="cedula" placeholder="Cedula" value="{{old('cedula')}}" class="form-control" autofocus >
                </div>
            </div>
            <div class="form-group">
                <label for="semester" class="col-sm-3 control-label">Semestre</label>
                <div class="col-sm-9">
                    <input type="number" id="semester" name="semester" placeholder="Semestre" value="{{old('semester')}}" class="form-control" autofocus >
                </div>
            </div>
            <div class="form-group">
                <label for="identification"  class="col-sm-3 control-label">Id universitario</label>
                <div class="col-sm-9">
                    <input type="number" id="identification" name="identification" value="{{old('identification')}}" placeholder="ID UNIVERSIDAD" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Rol de usuario</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" name="role" id="role" value="STUDENT">Estudiante
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" name="role" id="role" value="TEACHER">Maestro
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-9">
                    <label for="img">Seleccione una imagen</label>
                    <input type="file" id="img" name="img">
                </div>

            </div>
            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>

        </form> <!-- /form -->
    </div> <!-- ./container -->
    <br>
    <br>
    <br>
@endsection

