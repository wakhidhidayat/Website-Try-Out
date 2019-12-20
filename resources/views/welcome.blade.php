@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ config('app.name')}}</h1>
                    </div>
                    <h3 class="text-white">{{ config('app.desc')}} <br> <br>
                        Dengan mendaftar tryout, kamu akan mendapatkan <br>

                                - Snack <br>
                                - Faculty Fair <br>
                                - Talkshow <br>
                                - Doorprize <br>
                                - Stickers <br> <br>

                        YUK DAFTAR SEKARANG    </h3> <br>

                        <a class="btn btn-success" href="{{route('register')}}">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
