@extends('layouts/base')

@section('content')
<!-- Main component for call to action -->
<div class="container">
    <div class="pull-xs-right fl-right">
        <button type="button" class="btn btn-primary" onclick="showsearch()">
            <i id="slideIcon" class="fa fa-search" aria-hidden="true"></i> Search</button>
        @if($notebook->trashed())
        <a class="btn btn-blue-grey disabled" href="{{ route('notes.createNote',$notebook->id) }}" role="button" disabled>
            New Entry +
        </a>
        @else
        <a class="btn btn-primary" href="{{ route('notes.createNote',$notebook->id) }}" role="button">
            New Entry +
        </a>
        @endif
        <a class="btn btn-red" href="{{route('index')}}"> Back</a>

    </div>

    <div class="pull-xs-left">
        <h1 class="pull-xs-left">
            @if($active)
            Active Entries {{ $notebook->trashed() ? "History" : ""}}
            @else 
            @if($searching)
            Search Results
            @else
            All Entries {{ $notebook->trashed() ? "History" : ""}}
            @endif
            @endif
        </h1>
        <a class="trigger blue lighten-4" href="{{route('notebooks.show', ['notebookID' => $notebook->id, 'allEntries' => $active ])}}">
            @if($active)
            Show All Entries
            @else
            Show Active Entries
            @endif
        </a>
    </div>
    <hr/>
    <!-- SEARCH BAR AREA -->
    <div class="row">
        <div class="col-sm-12">
            <div id="searchCollapse">
                <h4>Search</h4>
                <div>
                    <form method="get" action="{{ route('notes.search',$notebook->id) }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" name="entryKeywords" type="text" placeholder="Key words..">
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
                        <div class="form-group float-left">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input id="hidden" class="form-check-input" name="hidden" type="checkbox" value="1"/>
                                        Include Hidden Entries
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input id="deleted" class="form-check-input" name="deleted" type="checkbox" value="1"/>
                                        Include Deleted Entries
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-primary" type="submit" role="button">Submit</button>
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
        <div class="card mt-3">
            <div class="card-body">
                <div class="fl-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                <h4 class="card-title ">
                    {{ $notesObj->noterecords->last()['title'] }}
                    <span class="badge badge-danger">Deleted Item</span>

                </h4>
                <p class="card-text">
                    {!! $notesObj->noterecords->last()['body'] !!}
                </p>

                <hr/>
                <a class="card-link" href="{{ route('notes.history',$notesObj->id) }}">History</a>
            </div>
        </div>
        <br/>
        @elseif($notesObj->isHide())
        <div class="card mt-3">
            <div class="card-body">
                <div class="fl-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                <h4 class="card-title blue-col">
                    {{ $notesObj->noterecords->last()['title'] }}
                    <span class="badge badge-warning">Hidden</span>
                </h4>
                <p class="card-text">
                    {!! $notesObj->noterecords->last()['body'] !!}
                </p>

                <hr/>

                <form class="fl-right" action="{{ route('notes.destroy',$notesObj->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-sm btn-danger fl-right" type="submit" value="Delete">
                </form>
                <a class="card-link btn btn-sm btn-primary" href="{{ route('notes.edit',$notesObj->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</a>
                <a class="card-link btn btn-sm btn-primary" href="{{ route('notes.history',$notesObj->id) }}"><i class="fa fa-history" aria-hidden="true"></i>
                    History</a>
            </div>
        </div>
        <br/>
        @else
        <div class="card mt-3">
            <div class="card-body">
                <div class="fl-right">{{ $notesObj->noterecords->last()['created_at']}}</div>
                <h4 class="card-title blue-col">
                    {{ $notesObj->noterecords->last()['title'] }}
                </h4>
                <p class="card-text">
                    {!! $notesObj->noterecords->last()['body'] !!}
                </p>

                <hr/>

                <form class="fl-right" action="{{ route('notes.destroy',$notesObj->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-sm btn-danger fl-right" type="submit" value="Delete">
                </form>
                <form class="fl-right" action="{{ route('notes.hide',$notesObj->id) }}" method="GET">
                    {{ csrf_field() }}
                    <input class="btn btn-sm btn-secondary fl-right" type="submit" value="Hide">
                </form>
                <a class="card-link btn btn-sm btn-primary" href="{{ route('notes.edit',$notesObj->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</a>
                <a class="card-link btn btn-sm btn-primary" href="{{ route('notes.history',$notesObj->id) }}"><i class="fa fa-history" aria-hidden="true"></i>
                    History</a>
            </div>
        </div>
        <br/>
        @endif
        @endforeach
    </div>
</div>
<!-- /container -->
@endsection
