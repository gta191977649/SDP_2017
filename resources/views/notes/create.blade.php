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
            The body or title or reason cannot be empty or all space !
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
        </div>
    </div>
    </div>
    <a class="btn btn-red pull-right" href="{{ url()->previous() }}"> Back</a>
    <h1>Create Entry</h1>
    <form action="{{route('notes.store')}}" method="POST" onsubmit="return validateForm()">
    {{ csrf_field() }}
        <div class="form-group">
            <label for"title">Entry Title</label>
            <input class="form-control" type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for"body">Entry Body</label>
            <!--<input class="form-control" type="text" name="body"> -->
            <textarea class="form-control" type="text" name="body"  rows="10" id="bodyField" required></textarea>
            @ckeditor('bodyField')

        </div>
        <input type="hidden" name="notebook_id" value="{{ $id }}">
        <input type="hidden" name="reason" id="reason" value="creation">

        <input class="btn btn-primary" type="submit" value ="Add" >
        <script>
            function validateForm()
            {
                if (CKEDITOR.instances.bodyField.getData() == '')
                {
                    $('#myModal').modal('show')
                    return false;
                }

                if ( $.trim( $('#title').val() ) == '' || $.trim( $('#reason').val() ) == '')
                {
                    $('#myModal').modal('show')
                    return false;
                }

            }
        </script>
        <a class="btn btn-secondary" href="{{ redirect()->getUrlGenerator()->previous() }}">Cancel</a>
    </form>
</div>
@endsection
