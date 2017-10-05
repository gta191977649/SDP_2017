@extends('layouts/base')
@section('content')

<div class = "container"> 
    <!-- Error Alert -->
    <div id="myModal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            The body cannot be empty !
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
        </div>
    </div>
    </div>
    <h1>Edit Note</h1>
    <form action=" {{ route('notes.update',$note->note_id ) }} " method="POST" onsubmit="return validateForm()">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
         <div class="form-group">
            <label for"title">Note Title</label>
            <input class="form-control" type="text" name="title" value="{{ $note->title }}" required>  
        </div>
        <div class="form-group">
            <label for"body">Note Body</label>

            <textarea class="form-control" type="text" name="body" rows="10" id="bodyField"  required>{!!$note->body !!}</textarea>
            @ckeditor('bodyField')
        </div>
        <script>
            function validateForm()
            {
                if (CKEDITOR.instances.bodyField.getData() == '')
                {
                    $('#myModal').modal('show')
                    return false;
                }
            }
        </script>
        <input type="hidden" name="notebook_id" value="{{ $note->notebook_id }}">
        <input class="btn btn-primary" type="submit" value ="Update">
    </form>
</div>   
@endsection

