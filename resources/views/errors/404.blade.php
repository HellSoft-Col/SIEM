@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('No Encontrado'))

@section('image')
    <div style="background-image: url('/svg/403.svg');"
         class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __("No existe la pagina que esta buscando"))
