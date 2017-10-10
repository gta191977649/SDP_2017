@extends('layouts/base')

@section('content')
<!-- Main component for call to action -->
<div class="container">
    <div class="pull-xs-right float-right">
        <button type="button" class="btn btn-primary" onclick="showsearch()">
            <i id="slideIcon" class="fa fa-search" aria-hidden="true"></i> Search</button>
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
        Entries {{ $notebook->trashed() ? "History" : ""}}
    </h1>
    <hr/>
    <!-- SEARCH BAR AREA -->	
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">	
            <div id="searchCollapse">
                <h4>Search</h4>
                <div>
                    <form method="POST" action="{{ route('notes.search',$notebook->id) }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" name="entryName" type="text" placeholder="Entry title..">
                            </div>
                        </div>
                        <div class="form-row">				
                            <div class="col">
                                <label class="col-form-label" for="fromDate">From</label>							
                                <input class="datepicker form-control" id="fromDate" name="fromDate" type="text"  placeholder="DD/MM/YYYY">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="toDate">To</label>							
                                <input class="datepicker form-control" id="toDate" name="toDate" type="text"  placeholder="DD/MM/YYYY">
                            </div>
                        </div>
                        <div class="form-row">                        
                            <div class="form-group col-md-6">
                                <button class="btn btn-primary" type="submit" role="button">Submit</button>
                            </div>	
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr />
    </div>
    @if($notes->count() == 0)
    <div class="alert alert-primary" role="alert">
        You have no entries.
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
