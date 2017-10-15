
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">


    <title>Jouneral App - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{ route('ucp.index') }}">Jouenral App Dashboard</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ucp.index') }}">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ucp.profile') }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ucp.setting.index') }}">Setting</a>
          </li>
          
        </ul>
        <ul class="navbar-nav float-right">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">Main Site</a>
          </li>
        </ul>
      </div>

      
            
           
        
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ucp.index') }}">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ucp.profile') }}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ucp.setting.index') }}">Setting</a>
            </li>
        
          </ul>

        
        </nav>

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
             @yield('content')
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
         <script src="{{ asset('js/jquery3.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/mdb.min.js') }}"></script>
        <script src="https://use.fontawesome.com/18c3499d9d.js"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
  </body>
</html>
