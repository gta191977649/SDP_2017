@if(Auth::user()->setting->theme == 0)
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
@elseif(Auth::user()->setting->theme == 1)
    <link rel="stylesheet" href="{{asset('css/theme/cerulean.css')}}">
    
@elseif(Auth::user()->setting->theme == 2)
@endif