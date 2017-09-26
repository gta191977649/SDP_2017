@extends('layouts/base')
@section('content')

<div class = "container"> 
    <h1>Edit Note</h1>
    <form action=" {{ route('notes.update',$note->note_id ) }} " method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
         <div class="form-group">
            <label for"title">Note Title</label>
            <input class="form-control" type="text" name="title" value="{{ $note->title }}" required>  
        </div>
        <div class="form-group">
            <label for"body">Note Body</label>

            <textarea class="form-control" type="text" name="body" rows="10" id="bodyField" required>{!!$note->body !!}</textarea>
            @ckeditor('bodyField')
            

        </div>
        <input type="hidden" name="notebook_id" value="{{ $note->notebook_id }}">
        <input class="btn btn-primary" type="submit" value ="Update">
    </form>
</div>   
@endsection

