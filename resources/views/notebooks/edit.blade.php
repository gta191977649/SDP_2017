@extends('layouts/base')
@section('content')

<div class = "container"> 
    <h1>Edit</h1>
    <form action="{{ route('notebooks.update',$notebook->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
        <div class="form-group">
            <label for"name">NoteBook Name</label>
            <input class="form-control" type="text" name="name" value="{{ $notebook->name }}" required>  
        </div>
        <input class="btn btn-primary" type="submit" value ="Update">
        
    </form>
</div>   
@endsection

