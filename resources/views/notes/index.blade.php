@extends('layouts/base')

@section('content')
    <!-- Main component for call to action -->
    <div class="container">
        <div class="pull-xs-right fl-right">
            @if($notebook->trashed())
            <a class="btn btn-blue-grey disabled" href="{{ route('notes.createNote',$notebook->id) }}" role="button" disabled>
                New Note +
            </a>
            @else
            <a class="btn btn-primary" href="{{ route('notes.createNote',$notebook->id) }}" role="button">
                New Note +
            </a>
            @endif
            <a class="btn btn-red" href="{{route('index')}}"> Back</a>
        </div>

        <h1 class="pull-xs-left">
            Notes {{ $notebook->trashed() ? "History" : ""}}
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


            @if($notesObj->trashed())
            <!-- Deal with deleted item here -->
                <div class="card">
                    <div class="card-body">
                    <div class="fl-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                    <a href="">

                        <h4 class="card-title ">
                            {{ $notesObj->noterecords->last()['title'] }}
                            <span class="badge badge-danger">Deleted Item</span>

                        </h4>
                    </a>
                    <p class="card-text">
                        {!! $notesObj->noterecords->last()['body'] !!}
                    </p>

                    <hr/>
                        <a class="card-link" href="{{ route('notes.history',$notesObj->id) }}">History</a>
                    </div>
                </div>
                <br/>
            @else
                <div class="card">
                    <div class="card-body">
                    <div class="fl-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                    <a href="">

                        <h4 class="card-title">
                            {{ $notesObj->noterecords->last()['title'] }}

                        </h4>
                    </a>
                    <p class="card-text">
                        {!! $notesObj->noterecords->last()['body'] !!}
                    </p>

                    <hr/>

                    <form class="fl-right" action="{{ route('notes.destroy',$notesObj->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="btn btn-sm btn-danger fl-right" type="submit" value="Delete">
                    </form>
                        <a class="card-link" href="{{ route('notes.edit',$notesObj->id) }}">Edit</a>
                        <a class="card-link" href="{{ route('notes.history',$notesObj->id) }}">History</a>
                    </div>
                </div>
                <br/>
            @endif
            @endforeach
        </div>
    </div>
    <!-- /container -->
@endsection
