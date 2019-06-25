<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
</head>
<body style="background-color: black; color: white;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar->default navbar-laravel"  style="background-color: black; color: white;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('family.login') }}">{{ __('Sign In') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a data-target="#navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    @if(Auth()->User()->profile != null)
                                    <img src="{{Auth()->User()->profile->profileImageLocation('display').Auth()->User()->profile->image->name}}" alt="user-img" class="img-circle user-img">
                                    @else
                                    <img src="assets/Profile/Images/male.png" alt="user-img" class="img-circle user-img">
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="navbarDropdown">
                                    <h5>Hi, {{Auth()->User()->first_name.' '.Auth()->User()->last_name}}</h5>
                                    
                                    <a class="dropdown-item" href="/home">Dashboard</a>

                                    <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>

                                    <a class="dropdown-item" href="{{route('profile.setting')}}">Profile Configuration</a>

                                    <a class="dropdown-item" href="{{route('page.index')}}">Pages</a>

                                    <a class="dropdown-item" href="{{route('post.index')}}">Posts</a>

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

        
            @yield('content')
        
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"> </script>
    <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @yield('scripts')
</body>
</html>
