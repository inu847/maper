<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Maper</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png')}}">
    <meta name="apple-mobile-web-app-title" content="Maper">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo.png')}}">

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/animate.css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/app.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/font.css')}}" type="text/css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-toggleable-sm navbar-md fixed-top white">
            <div class="container">
                <a data-toggle="collapse" data-target="#navbar-1" class="navbar-item pull-right hidden-md-up m-a-0 m-l">
                    <i class="fa fa-bars"></i>
                </a>

                <!-- brand -->
                <a class="navbar-brand md" href="#home" ui-scroll-to="home">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                        <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add" />
                        <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)" />
                        <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa" />
                    </svg>

                    <span class="hidden-folded inline">Maper</span>
                </a>
                <!-- / brand -->

                <!-- navbar collapse -->
                <div class="collapse navbar-collapse text-center white" id="navbar-1">
                    <!-- link and dropdown -->
                    {{-- <ul class="nav navbar-nav nav-active-border bottom b-primary ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#demos" ui-scroll-to="demos">
                                <span class="nav-text">Demos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features" ui-scroll-to="features">
                                <span class="nav-text">Features</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">
                                <span class="nav-text">Support</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="angular/#/app/docs">
                                <span class="nav-text">Documentation</span>
                            </a>
                        </li>
                    </ul> --}}
                    <!-- / link and dropdown -->
                </div>
                <!-- / navbar collapse -->

                <ul class="nav navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <span class="btn btn-sm rounded accent text-u-c _700">
                                    Login
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <span class="btn btn-sm rounded accent text-u-c _700">
                                    Register
                                </span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <span class="btn btn-sm rounded accent text-u-c _700">
                                    {{ Auth::user()->name }}
                                </span>
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30"
            style="position:fixed; z-index:0; left:50%; top: 20%" class="animated fadeInDownBig">
            <path d="M 48 0 L 24 48 L 0 0 Z" fill="rgba(0,0,0,0.05)" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="10" height="10"
            style="position:fixed; z-index:0; left:49%; top: 15%" class="animated fadeInDown">
            <path d="M 48 0 L 24 48 L 0 0 Z" fill="#a88add" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="5" height="5"
            style="position:fixed; z-index:0; left:30%; top: 0%" class="animated fadeInDown">
            <path d="M 48 0 L 24 48 L 0 0 Z" fill="#a88add" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="20" height="20"
            style="position:fixed; z-index:0; right:5%; top: 30%" class="animated fadeInDown">
            <path d="M 48 0 L 24 48 L 0 0 Z" fill="#0cc2aa" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="15" height="15"
            style="position:fixed; z-index:0; left:34.5%; top: 55%" class="animated fadeIn">
            <path d="M 0 48 L 24 0 L 48 48 Z" fill="#fcc100" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="200" height="200"
            style="position:fixed; z-index:0; right:20%; top: 70%" class="animated fadeInUp">
            <path d="M 0 48 L 24 0 L 48 48 Z" fill="rgba(252,193,0,0.1)" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="120" height="120"
            style="position:fixed; z-index:0; left:0%; top: 30%" class="animated fadeInLeftBig">
            <path d="M 0 48 L 48 24 L 0 0 Z" fill="rgba(0,0,0,0.03)" />
        </svg>
    </div>
    <div class="page-content" id="home">
        @yield('content')
    </div>
    <footer class="black pos-rlt">
        <div class="footer dk">
            <div class="b b-b"></div>
            <div class="p-a-md">
                <div class="row footer-bottom">
                    <div class="col-sm-8">
                        <small class="text-muted">&copy; Copyright {{ now()->year }}. All rights reserved.</small>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-sm-right text-xs-left">
                            <strong>Maper Application</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('libs/jquery/jquery/dist/jquery.js')}}"></script>
    <script src="{{ asset('libs/jquery/tether/dist/js/tether.min.js')}}"></script>
    <script src="{{ asset('libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{ asset('scripts/ui-scroll-to.js')}}"></script>
</body>

</html>