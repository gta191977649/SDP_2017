@extends('layouts/base')

@section('content')
<!-- Main component for call to action -->
<div class="container">
    <!-- SEARCH BAR AREA -->		
        <div class="col-sm-3"></div>
        <div class="col-sm-6">	
            <div class="card border-0">
                <h4 class="card-title">Search: </h4>
                <div class="card-block">
                    <form>	
                        <input type="text" placeholder="Entry name..">
                        <button type="button" id="slideBtn" class="btn btn-primary btn-sm" onclick="showsearch()">
                            <i id="slideIcon" class="fa fa-caret-down" aria-hidden="true"></i></button>
                        <div class="row" id="searchCollapse">
                            <div class="col">									
                                <div class="form-group">
                                    <label id="lbldate1">From: </label><br>							
                                    <input id="datepicker1" type="text"  placeholder="DD/MM/YYYY">
                                </div>
                                <div class="form-group">
                                    <label id="lbldate2">To:</label><br>							
                                    <input id="datepicker2" type="text"  placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            <div class="col">
                                <p><input class="w3-check" type="checkbox">
                                    <label> Show Hidden</label></p>
                                <button class="btn btn-primary" onclick="submit" role="button">
                                    Submit
                                </button>
                            </div>	
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div class="pull-xs-right float-right">
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
                <div class="float-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                <a href="">

                    <h4 class="card-title ">
                        {{ $notesObj->noterecords->last()['title'] }}
                        <span class="badge badge-secondary">Deleted Item</span>

                    </h4>
                </a>
                <p class="card-text">
                    {!! $notesObj->noterecords->last()['body'] !!}
                </p>

                <hr/>


                <input class="btn btn-sm btn-danger float-right" type="submit" value="Deleted" disabled>
                <a class="card-link" href="{{ route('notes.history',$notesObj->id) }}">History</a>
            </div>
        </div>
        <br/>
        @else
        <div class="card">
            <div class="card-body">
                <div class="float-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                <a href="">

                    <h4 class="card-title">
                        {{ $notesObj->noterecords->last()['title'] }}

                    </h4>
                </a>
                <p class="card-text">
                    {!! $notesObj->noterecords->last()['body'] !!}
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
        <br/>
        @endif
        @endforeach
    </div>
</div>
<!-- /container -->
@endsection
