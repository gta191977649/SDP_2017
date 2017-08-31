<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NoteBook App</title>
    <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar  navbar-dark bg-primary">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
                &#9776;
            </button> 
             <a class="navbar-brand justify-content-end" href="/">NoteBook App</a>
            
        </nav>
        <!-- /navbar -->
        <!-- Main component for call to action -->
        
        @yield('content')<!-- 自定义内容 -->
    </div>
    <!-- /container -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Footer</span>
        </div>
    </footer>
    <!-- Js Stuff -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="{{ asset('dist/js/jquery3.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.js') }}"></script>


</body>

</html>
