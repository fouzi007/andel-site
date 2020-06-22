<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ settings('site_name') }} | Erreur {{$exception->getStatusCode()}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    @yield('page-css')
</head>
<body  class="h-75">
<nav class="navbar navbar-expand-lg shadow-sm">
   <div class="container">
       <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('img/logo.png') }}" class="w-50"></a>
       <ul class="navbar-nav ml-auto">
           <!-- Authentication Links -->

           @guest
               <li class="nav-item">
                   <a class="nav-link text-andel" href="{{ route('login') }}"><i class="fal fa-sign-in-alt"></i> {{ __('Login') }}</a>
               </li>
               @if (Route::has('register'))
                   <li class="nav-item">
                       <a class="nav-link text-andel" href="{{ route('register') }}"><i class="fal fa-user-plus"></i> {{ __('Register') }}</a>
                   </li>
               @endif
           @else

               <li class="nav-item dropdown">
                   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       <i class="fal fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       @if(auth()->user()->role_id ==1)
                           <a href="{{route('admin.index')}}" class="dropdown-item">Gestion</a>
                       @endif
                       <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                   </div>
               </li>
           @endguest
       </ul>
   </div>
</nav>
<div id="app" class=" h-100 d-flex align-items-center justify-content-center ">
    {{-- <main class="py-4"> --}}

    <div class="mt-lg-5">


        <div class="container text-center">
{{--            <img src="{{ asset('img/logo.png') }}" alt=""> <br>--}}
            <h3 class="display-2">503</h3>
            <p class="lead">{{ $exception->getMessage() }}</p>
        </div>
    </div>
    {{-- </main> --}}
</div>
<div class="jumbotron jumbotron-fluid fixed-bottom bg-andel text-white mt-4 mb-0 w-100" >
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
