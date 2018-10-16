@extends('layouts.layout')

@section('content')

    <div class=”title m-b-md”>

        Debe ser {{ strtoupper($message)}} para accesar esta pagina !

    </div>

@endsection
