@extends('layouts/base')
@section('content')
<!-- /navbar -->
<!-- Main component for call to action -->
<div class="container-fluid">

    <!-- heading -->
    <div class="pull-xs-right float-right">
        <button type="button" id="slideBtn" class="btn btn-primary" onclick="showsearch()">
            <i id="slideIcon" class="fa fa-search" aria-hidden="true"></i> Search</button>
        <button type="button" class="btn btn-primary" data-modal="CJ">+ New Notebook</button>
    </div>
    <h1 class="pull-xs-left">
        Your Journals
    </h1>

    <hr/>
    <!-- SEARCH BAR AREA -->	
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">	
            <div id="searchCollapse">
                <h4>Search</h4>
                <div>
                    <form method="POST" action="/notebooks/search">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" name="journalName" type="text" placeholder="Journal name..">
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
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input id="hidden" class="form-check-input" name="hidden" type="checkbox" value="">
                                        Show Hidden
                                    </label>
                                </div>
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
    </div>
    <hr />
    @if($notes->count() == 0)
    <div class="alert alert-primary" role="alert">
        You have no notebooks.
    </div>
    @endif
    <div class="row">
        @foreach ($notes as $noteObj)
        @if(!($noteObj->trashed()))
        <div class="col-sm-6 col-md-3 notebook">
            <div class="card p-2">
                <div class="card-block">

                    <a  href="{{ route('notebooks.show',$noteObj->id) }}">
                        <h4 class="notebook-title">
                            {{ $noteObj->name }}
                        </h4>
                    </a>
                    <a href="#" class="pull-right card-edit-link " data-toggle="modal" data-modal="EJ" data-id="{{ $noteObj->id }}" data-text="{{ $noteObj->name }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                </div>
                <a href="#">
                    <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook.jpg') }}"/>
                </a>
                <div class="card-block pt-2">
                    <form  action="/notebooks/{{ $noteObj->id }}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                        {{ method_field('DELETE') }} <!-- ?? -->
                        {{ csrf_field() }}
                        <input class="btn btn-sm btn-danger float-right" type="submit" value="Delete">
                        </input>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <hr/>
    <div class="pull-xs-right float-right">
        <button id="hideToggle" class="btn btn-primary" role="button" value="">Show Trashed Journals</button>
    </div>
    <h2 class="hidden-notebook-title">Hidden or Deleted Journals</h2>
    <hr/>
    <div class="animate fadeIn row">
        @foreach ($notes as $noteObj)

        @if(($noteObj->trashed()))
        <div class="col-sm-6 col-md-3 notebook notebook-hidden">
            <div class="card p-2">
                <div class="card-block">
                    <a href="{{ route('notebooks.show',$noteObj->id) }}">
                        <h4 class="notebook-title">
                            {{ $noteObj->name }}
                        </h4>
                    </a>
                    <div class="card-link2">
                        REMOVED
                    </div>
                </div>
                <a href="#">
                    <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook-del.jpg') }}"/>
                </a>
                <div class="card-block pt-2">
                    <input class="btn btn-sm btn-danger float-right" type="submit" value="Deleted" disabled/>
                </div>
            </div>
        </div>

        @endif
        @endforeach
    </div>
</div>
<!-- /container -->
@endsection
