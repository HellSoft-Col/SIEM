<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIEM</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('includes')
    <link rel="stylesheet" href="{{ asset('/css/mystyle.css') }}">
</head>

<body id="page-top">

<nav class="navbar nav-masthead navbar-dark sticky-top navbar-expand-lg text-center" style="background-color: #000000;" id="mainNav">
    <button class="navbar-toggler collapsed navbar-toggler-right text-center" type="button" data-toggle="collapse" data-target="#navbarTogglerSIEM" aria-controls="navbarTogglerSIEM" aria-halflings-expandes="false" aria-label="Toggle navigation">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
        <span class="sr-only">Toggle navigation</span>
    </button>

    <a class="navbar-brand mx-auto js-scroll-trigger" href="{{ url('') }}">
        <img id="logo" src="{!! asset('/svg/logo_white.svg') !!}" height="55" class="d-inline-block align-top"
             alt="Logo Siem">
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerSIEM">
        <div class="navbar-nav mx-auto text-center">
            <a class="nav-item nav-link {{ Request::is('/') ? 'active' : ''}} js-scroll-trigger" href="{{ url('') }}">Inicio </a>
            <a class="nav-item nav-link {{ Request::is('events') ? 'active' : ''}} js-scroll-trigger"
               href="{{ url('/events') }}">Eventos</a>
            <a class="nav-item nav-link {{ Request::is('feed') ? 'active' : ''}} js-scroll-trigger"
               href="{{ url('/feed ') }}">Publicaciones</a>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <a class="mr-2 btn btn-outline-light text-light js-scroll-trigger" href="{{ url('/login') }}">Login</a>
        </div>
    </div>
</nav>

<main role="main" class="main">
    @yield('content')
</main>
<!-- Footer -->
<footer class="page-footer font-small indigo" style="bottom: 0;">

    <!-- Footer Links -->
    <div class="container">

        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5 sm-3">

            <!-- Grid column -->
            <div class="col-sm-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="http://www.javeriana.edu.co" class="enlaces">Universidad</a>
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-sm-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="http://artes.javeriana.edu.co/facultad/servicios" class="enlaces">Faculdad</a>
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-sm-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#" class="enlaces">Ayuda</a>
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-sm-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="mailto:admin@javeriana.edu.co" class="enlaces">Contacto</a>
                </h6>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->
        <hr class="rgba-white-light divider" style="margin: 0 15%;">

        <!-- Grid row-->
        <div class="row d-flex text-center justify-content-center mb-sm-12 mb-4">

            <!-- Grid column -->

            <div class="col-sm-8 col-12 mt-5">
                <img src="{{ asset('/svg/logojave.svg') }}" height="120">
            </div>

            <!-- Grid column -->

        </div>
        <!-- Grid row-->
        <hr class="clearfix d-sm-none rgba-white-light" style="margin: 10% 15% 5%;">

        <!-- Grid row-->
        <div class="row pb-0 text-center justify-content-center mb-sm-0 mb-4">

            <!-- Grid column -->
            <div class="col-sm-6">

                <div class="mb-5 flex-center">

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/unijaveriana/" class="fb-ic">
                        <i class="fa fa-facebook fa-lg white-text mr-4"> </i>
                    </a>
                    <!-- Twitter -->
                    <a href="https://www.facebook.com/unijaveriana/" class="tw-ic">
                        <i class="fa fa-twitter fa-lg white-text mr-4"> </i>
                    </a>
                    <!-- Google +-->
                    <a href="https://www.facebook.com/unijaveriana/" class="gplus-ic">
                        <i class="fa fa-google-plus fa-lg white-text mr-4"> </i>
                    </a>
                    <!--Linkedin -->
                    <a href="https://www.facebook.com/unijaveriana/" class="li-ic">
                        <i class="fa fa-linkedin fa-lg white-text mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a href="https://www.facebook.com/unijaveriana/" class="ins-ic">
                        <i class="fa fa-instagram fa-lg white-text mr-4"> </i>
                    </a>
                    <!--Pinterest-->
                    <a href="https://www.facebook.com/unijaveriana/" class="pin-ic">
                        <i class="fa fa-pinterest fa-lg white-text"> </i>
                    </a>

                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="bottom: 0;">© 2018 Copyright:
        <a href="https://github.com/HellSoft-Col"> HellSoft Colombia</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@yield('scripts')
<script src="{{ asset('/js/script.min.js') }}" type="text/javascript"></script>

</body>

