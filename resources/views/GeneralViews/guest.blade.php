@extends('layouts.layout')
@section('includes')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/home/main.css') }}">

@endsection
@section('content')
    <div class="container color d-flex justify-content-center">
        <h1><b>Sistema de Información de Estudios Musicales</b></h1>
    </div>
    <div class="container color mt-5">
        <div class="row">
            <div class="col">
                <img src="{{asset('/photos/p3.jpeg')}}" width="100%">
                <p class="mt-5" style="font-size: 18px;">

                    Título que otorga: Maestro en música con énfasis (depende del que escoja el estudiante)

                    Modalidad: Presencial

                    Duración estimada: Diez (10) semestres (Según resultados del examen de ubicación, el estudiante
                    podrá requerir cursar semestre de nivelación).

                    Resolución de registro calificado: 3677 del 2 de marzo del 2018, vigencia hasta el 2 de marzo de
                    2025.
                </p>
            </div>
            <div class="col">
                <p style="font-size: 18px;">El Programa de Estudios Musicales se ha planteado como una alternativa
                    novedosa que propende por un estudio integral de la música, partiendo esencialmente desde un
                    entendimiento crítico y contextualizado de los elementos que constituyen este arte,
                    buscando generar un músico analítico y consciente de su oficio, de su objeto de estudio, y de su
                    lugar en la sociedad. De esta manera, desde su creación en 1991, el Programa se ha convertido en un
                    referente nacional de la formación musical, ofreciendo al medio cultural colombiano
                    unos profesionales en música con consciencia social y altamente comprometidos con la excelencia en
                    su oficio.</p>
                <img src="{{asset('/img/post_violin.jpg')}}" width="100%" class="mb-5">
            </div>
        </div>

    </div>
@endsection
