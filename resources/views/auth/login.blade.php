@extends('layouts.layout')
@section('includes')
    <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v17/images/icons/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('/css/login/util.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/login/main.css') }}">
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="login100-form-avatar">
                        <img src="{{ asset('/img/logo_siem.png') }}" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
						INICIO DE SESION SIEM
					</span>

                    @php ($msj = "")
                    @if ($errors->has('email'))
                        @php ($msj = $errors->first('email'))
                    @endif

                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('email') ? ' alert-validate' : '' }}" data-validate="{{$msj}}">
                        <input class="input100" name="email" placeholder="Nombre de usuario" type="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>

                    </div>

                    @php ($msj2 = "")
                    @if ($errors->has('password'))
                        @php ($msj2 = $errors->first('password'))
                    @endif

                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('password') ? ' alert-validate' : '' }}" data-validate="{{$msj2}}">
                        <input class="input100" name="password" placeholder="Contraseña" type="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit">
                            Iniciar Sesión
                        </button>
                    </div>

                </form>

                <div class="text-center w-full p-t-25 p-b-230">
                    <a href="#" class="txt1">
                        Olvide mi contraseña ?
                    </a>
                </div>

                <div class="text-center w-full">
                    <a class="txt1" href="{{ url('/login') }}">
                        Registrarse
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js" ></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.js" ></script>
    <script src="{{ asset('/js/login/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/login/js.js') }}" type="text/javascript"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>


@endsection
