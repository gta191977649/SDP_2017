<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NoteBook App</title>

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>

<body>

    <div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ route('index') }}">NoteBook App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_menu" aria-controls="nav_menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="nav_menu">

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    @if(Auth::user())
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                        </div>
                    @else
                        <a class="nav-link dropdown-toggle" href="{{route('login')}}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{ route('Register')}}">Register</a>
                        </div>
                    @endif
                </li>
            </ul>

        </div>
    </nav>

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
    <script src="https://use.fontawesome.com/c48d3cddbd.js"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <!-- <script src="{{ asset('js/jquery3.min.js') }}"></script> -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


</body>

</html>
