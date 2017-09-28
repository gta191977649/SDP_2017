<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NoteBook App</title>
          <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('index') }}">NoteBook App</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::user())
                        <div class="nav-item dropdown">
                            <a class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
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
                </span>
            </nav>
        </div>
        <div class="container">

            <!-- Old nav
            <nav class="navbar  navbar-dark bg-primary">
                <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
                    &#9776;
            </button>
                @if(Auth::user())
                   {{ Auth::user()->name }}
                    @else
                    <a href="/login">login</a>
                @endif
                 <a class="navbar-brand justify-content-end" href="{{ route('index') }}">NoteBook App</a>
                <div class="collapse navbar-collapse" id="nav_menu">

                </div>
            </nav>
            -->
            <!-- /navbar -->
            <!-- Main component for call to action -->

            @yield('content')<!-- 自定义内容 -->
        </div>
        {{--
    <!-- /container -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Footer</span>
        </div>
    </footer>
    --}}
        <!-- Js Stuff -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://use.fontawesome.com/c48d3cddbd.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <!-- <script src="{{ asset('js/jquery3.min.js') }}"></script> -->
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    </body>

</html>
