<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    
    <!--<script src="{{ asset('js/frontend/moment.min.js') }}" defer></script>-->
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/style.css') }}" rel="stylesheet">
    -->

    <link href="{{ asset('css/frontend/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/frontend/css/bootstrap-responsive.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/frontend/css/prettyPhoto.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/frontend/css/animate.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic|Roboto+Condensed:400,300,700" rel="stylesheet" />

    <link href="{{ asset('css/frontend/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/frontend/color/default.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/frontend/css/custom.css')}}" rel="stylesheet" />


    <!-- Javascript Library Files -->
    <script src="{{ asset('css/frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('css/frontend/js/jquery.easing.js')}}"></script>
    <script src="{{ asset('css/frontend/js/bootstrap.js')}}"></script>
    <script src="{{ asset('css/frontend/js/parallax/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{ asset('css/frontend/js/nagging-menu.js')}}"></script>
    <script src="{{ asset('css/frontend/js/jquery.nav.js')}}"></script>
    <script src="{{ asset('css/frontend/js/prettyPhoto/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('css/frontend/js/portfolio/jquery.quicksand.js')}}"></script>
    <script src="{{ asset('css/frontend/js/portfolio/setting.js')}}"></script>
    <script src="{{ asset('css/frontend/js/hover/jquery-hover-effect.js')}}"></script>
    <script src="{{ asset('css/frontend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('css/frontend/js/animate.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

    <!-- Contact Form JavaScript File -->
    <!--<script src="{{ asset('contactform/contactform.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>-->
    <!-- Template Custom Javascript File -->
    
    <script src="{{ asset('js/frontend/front-end.js') }}" defer></script>

  
</head>
<body>

<header>
    <!-- start top -->
    <div id="topnav" class="navbar navbar-fixed-top default">
      <div class="navbar-inner">
        <div class="container">
          <div class="logo">
            <a href="{{ route('sales.dashboard.index') }}"><img src="{{ asset('css/frontend/img/logo.png')}}" alt="" /></a>
          </div>
          <div class="navigation">
            <nav>
              <ul class="nav pull-right">               
                @guest
                
                <li><a class="" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="" href="{{ route('register') }}">{{ __('Register') }}</a></li>

                @else
                <li><a href="{{ route('sales.dashboard.index') }}">Home</i></a>
                <li><a href="{{ route('sales.client.index') }}">Clients</i></a>
                <li><a href="{{ route('sales.client.create') }}">Add Client</i></a>
                <li><a href="#">{{ Auth::user()->name }}</i></a></li>
                <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>

                
                @endguest
                
              </ul>
            </nav>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- end top -->
  </header>

    <section class="section">
    <div class="container">
        @yield('content')
    </div>
    </section>
  

</body>
</html>
