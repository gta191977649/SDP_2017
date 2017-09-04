@extends('layouts/base')

@section('content')
    <div class="container">
        <div class="float-right">{{ $note->created_at}}</div>
        
        <h1>{{ $note->title }}</h1>
        <hr/>
        <p>{{ $note->body }} </p>

    </div>
@endsection