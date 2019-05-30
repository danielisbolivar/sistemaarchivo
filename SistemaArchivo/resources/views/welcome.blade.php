<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>DACE UNERG</title>
        <link rel="icon" type="image/png" href="{{ asset('img/index.png') }}" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
        <style>
            html, body {
                background-image: url('img/fondo.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-style: bold;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ url('/login') }}">Iniciar Sesión</a>
                    @endauth
                </div>
            @endif
            
            <div class="container">
                <div class="text-center">
                    <h1><strong>Sistema de Control de Archivos de Expediente<br> DACE-UNERG</strong></h1>
                </div>

                <div class="links text-center">
                    <a href="http://cde.unerg.edu.ve" target="_blank">Dace-Unerg</a>
                    <a href="http://www.unerg.edu.ve/" target="_blank">Unerg</a>
                    </a>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
