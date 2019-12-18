<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffffff!important;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 900;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .desk {
               margin-left:10%;
               margin-right:10%;
               margin-bottom:10%;
            }
            .d {
                margin-bottom:10px;
                font-size: 20px;
                font-weight: 900;
            }
            .m-b-md {
                margin-bottom: 10px;
            }
        </style>
            <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-left" href="#">
                <img src="{{ asset('/images/image001.jpg') }}" width="50" height="50" class="d-inline-block align-top" alt="images 1">
                <img src="{{ asset('/images/image002.png') }}" width="50" height="50" class="d-inline-block align-top" alt="images 1">
                <img src="{{ asset('/images/image003.png') }}" width="100" height="50" class="d-inline-block align-top" alt="images 1">
            </div>    
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name')}}
                </div>
                <div class="d">
                    19 Januari 2020
                    SMA N 1 Bekasi
                </div>
                <div class="desk">
                    {{ config('app.desc')}}
                </div>
                <div class="links">
                    <a href="{{ route('register')}}" ><button class="btn btn-lg btn-primary" >Daftar Sekarang</button> </a>
                </div>
            </div>
        </div>
    </body>
</html>
