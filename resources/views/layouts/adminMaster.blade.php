<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <link href="{{asset('assets/fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
    <link href="{{asset('assets/fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
    <link href="{{asset('assets/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
    <link href="{{asset('assets/fullcalendar/packages/list/main.css')}}" rel='stylesheet' />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
   
    <title>{{ config('app.name', 'AMPRST') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <!--  add  -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <div id="app">
    <!-- fin -->
       <div class="sidenav">
            <a href="{{ url('adminHome')}}">Accueil</a>
            <a href="{{ url('index') }}">Adhérents</a>
            <a href="{{url('/Evenement')}}">Événements</a>
            <a href="#">Gestion financière</a>
            <a href="{{ url('sendemail') }}">Diffusion des messages</a>
        </div>
        <!-- change -->
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('adminHome')}}">
                    {{ config('app.name', 'AMPRST') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </div>
        </nav>
        <div class="main">

       
           @yield('content')
        </div>
    
    </div>





<script src="{{asset('assets/fullcalendar/packages/core/main.js')}}"></script>
<script src="{{asset('assets/fullcalendar/packages/interaction/main.js')}}"></script>
<script src="{{asset('assets/fullcalendar/packages/daygrid/main.js')}}"></script>
<script src="{{asset('assets/fullcalendar/packages/timegrid/main.js')}}"></script>
<script src="{{asset('assets/fullcalendar/packages/list/main.js')}}"></script>

<script src="{{asset('assets/fullcalendar/packages/core/locales-all.js') }}"></script>

<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.3/moment.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src='fullcalendar/resource-common/main.js'></script>
    <script src='fullcalendar/resource-timeline/main.js'></script>

    @yield('scripts')
</body>
</html>