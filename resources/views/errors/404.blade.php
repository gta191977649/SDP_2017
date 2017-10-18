@extends('layouts/base')
@section('content')

    <h1>Oops there is something wrong</h1>
    <p>404 page not found!</p>
    <a class="btn btn-lg btn-primary " href="{{ route('notebooks.index') }}" role="button">Back to home</a>
   
@endsection 
