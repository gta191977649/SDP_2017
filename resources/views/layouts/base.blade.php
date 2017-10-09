<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Journel</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <!-- Angular JS -->
        <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
    </head>

    <body>
        <header>

                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <div class="siteLogo">J</div>
                                Journel
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                @if(Auth::user())
                                    <div class="nav-item dropdown">
                                        <a class="btn btn-light-blue dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                @else
                                <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
        </header>
        <main>
            <div class="container">
                @yield('content')<!-- 自定义内容 -->
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <div class="text-muted">©Journal 2017 | Powered by <a class="footer-link" href="https://laravel.com">Laravel</a> | <a class="footer-link" href="{{route('help')}}">Help</a></div>
            </div>

        </footer>

        <!-- Js Stuff -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script src="https://use.fontawesome.com/c48d3cddbd.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
         <script src="{{ asset('js/jquery3.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/mdb.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

    </body>

</html>
