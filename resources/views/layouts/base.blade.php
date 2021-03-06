﻿<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Journal</title>
      <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Deal with custom theme -->
      @if(isset(Auth::user()->setting->theme))
      @include("theme.theme")
      @else <!-- when user doen't set their theme,use default theme -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
      @endif
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <!-- Angular JS -->
      <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
   </head>
   <body>
  
      <header>
         <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
               <div class="navbar-header">
                  <a class="navbar-brand" href="{{ route('index') }}">
                     <div class="siteLogo">J</div>
                     Journal
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  @if(Auth::user())
                  <ul class="nav navbar-nav ml-auto">
                     <div class="nav-item dropdown">
                        <a class="btn btn-light-blue dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="color:white;"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="{{ route('ucp.index') }}">Profile</a>
                           <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                        </div>
                     </div>
                  </ul>
                  @else
                  <ul class="nav navbar-nav ml-auto">
                     <a class="nav-link" href="{{ route('login') }}"><span style="color:white;">Login<span></a>
                     <a class="nav-link" href="{{ route('register') }}"><span style="color:white;">Register<span></a>
                  </ul>
                  @endif
               </div>
               <div class="nav-item">
                  <a class="nav-link" title="Report a bug" href="mailto:dev@journel.com?subject=BUG REPORT">
                  <i class="fa fa-warning" style="color: white;" aria-hidden="true"></i> 
                  </a> 
               </div>
            </div>
         </nav>
      </header>
      <main>
         <div class="container">
            @yield('content')<!-- Custom Area -->
         </div>
      </main>
      <footer class="footer">
         <div class="container">
            <div class="text-muted">©Journal 2017 | Powered by <a class="footer-link" href="https://laravel.com">Laravel</a> | 
               <a class="footer-link" href="{{route('help')}}">Help</a> |
               <a class="footer-link" title="Report a bug..." href="mailto:dev@journel.com?subject=BUG REPORT">Report a bug</a>
            </div>
         </div>
      </footer>
      <!-- Js Stuff -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
      <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
      <script src="{{ asset('js/jquery3.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/jquery-ui.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      
      @if(isset(Auth::user()->setting->theme))
      @if(Auth::user()->setting->theme == 0)
      <script src="{{ asset('js/mdb.min.js') }}"></script>
      @endif
      @else
      <script src="{{ asset('js/mdb.min.js') }}"></script>
      @endif
      <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
   </body>
</html>