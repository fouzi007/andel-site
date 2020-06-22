<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ settings('site_name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    @yield('page-css')
</head>
<body>
<div id="app">
    @include('layouts.navbar')
    {{-- <main class="py-4"> --}}
    @yield('content')
    {{-- </main> --}}
</div>
<div class="jumbotron jumbotron-fluid bg-andel text-white mt-4 mb-0 w-100 pt-4 pb-1" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Liens utiles</h4>
                <ul>
                    <li>Nous Contacter</li>
                    <li>Le congrès annuel</li>
                    <li>Annuaire</li>
                </ul>

            </div>
            <div class="col-md-4">
                <h4>
                    Social
                </h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fab fa-facebook"></i></span><a href="https://facebook.com/endocrino.andel" class="text-white">endocrinoandel</a></li>
                    <li><span class="fa-li"><i class="fab fa-viber"></i></span>andel national ,andel centre,  andel ouest et andel est
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Coordonées</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-phone"></i></span> <a href="tel:+213557441477" class="text-white">+213 557 44 14 77</a></li>
                    <li><span class="fa-li"><i class="fas fa-at"></i></span> <a
                            class="text-white" href="mailto:contact@andel-dz.com">contact@andel-dz.com</a></li>
                    <li><span class="fa-li"><i class="fas fa-map-marker"></i></span> 06, Rue Mohamed Rabia Kouba Alger
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" ></script>
@yield('scripts')
</body>
</html>
