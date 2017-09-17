@extends('layouts/base')

@section('content')
    <!-- Main component for call to action -->
    <div class="container">
        <div class="pull-xs-right float-right">
            <a class="btn btn-primary" href="{{ route('notes.createNote',$notebook->id) }}" role="button">
                New Note +
            </a>
            
        </div>
      
        <h1 class="pull-xs-left">
            Notes
        </h1>
        <hr/>
        @if($notes->count() == 0)
            <div class="alert alert-primary" role="alert">
                You have no note.
            </div>
        @endif
        
        <!--============= notes=========== -->
        <div class="list-group notes-group">

            <!--note1 -->
            @foreach($notes as $notesObj)
            
            
          
            <div class="card mb-3">
                <div class="card-body">
                <div class="float-right">{{ $notesObj->noterecords->first()['created_at']}}</div>
                <a href="">
                
                    <h4 class="card-title">
                        {{ $notesObj->noterecords->first()['title'] }}
                        
                    </h4>
                </a>
                <p class="card-text">
                    {{ $notesObj->noterecords->first()['body'] }}
                </p>

                <hr/>

                <form action="{{ route('notes.destroy',$notesObj->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-sm btn-danger float-right" type="submit" value="Delete">
                </form>
                    <a class="card-link" href="{{ route('notes.edit',$notesObj->id) }}">Edit</a>
                    <a class="card-link" href="{{ route('notes.history',$notesObj->id) }}">History</a>
                </div>
            </div>
          
            @endforeach
        </div>
    </div>
    <!-- /container -->
@endsection