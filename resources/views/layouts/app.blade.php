<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                        <li class="nav-item">
                            @if (auth()->check())
                                <a href="" class="nav-link">My Locations</a>
                            @else
                                <a href="" class="nav-link">Locations</a>
                            @endif
                        </li>

                        @if (auth()->check() && Auth::user()->hasRole('admin'))
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('helpdesk.index') }}">{{ __('Helpdesk') }}</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe fe-plus"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="">New location</a>
                                    <a class="dropdown-item" href="">New organisation</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('notifications.index') }}" class="nav-link">
                                    <i class="fe fe-bell"></i>

                                    @if ($notificationCounter > 0)
                                        <span style="margin-top: -.25rem;" class="badge align-middle badge-pill badge-danger">
                                            {{ $notificationCounter }}
                                        </span> 
                                    @endif
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('profile.settings') }}"><i class="fe fe-sliders mr-1 tw-text-grey-darker"></i> Settings</a>

                                    @if (Auth::user()->hasRole('user'))
                                        <a class="dropdown-item" href="#"><i class="fe fe-help-circle mr-1 tw-text-grey-darker"></i> Need help?</a>
                                    @endif

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" lass="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fe fe-power mr-1 tw-text-red"></i> Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf {{-- Form request protection --}}
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">&copy; {{ config('app.name') }}</span>

                <div class="float-right">
                    <a href="" class="no-underline text-muted">Privacy</a>
                    <span class="text-muted">|</span>
                    <a href="" class="no-underline text-muted">Terms of Service</a>
                    <span class="text-muted">|</span>
                    <a target="_blank" href="https://github.com/Scouting-Compass/Compass.app" class="no-underline text-muted">Github</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
