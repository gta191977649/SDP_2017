@extends('layouts/base')
@section('content')
<!-- /navbar -->
<!-- Main component for call to action -->
<div class="container-fluid">

    <!-- heading -->
    <div id="newJournalButton" class="pull-xs-right fl-right">
        <button type="button" class="btn btn-primary" onclick="showsearch()"><i id="slideIcon" class="fa fa-search" aria-hidden="true"></i> Search</button>
        <button type="button" class="btn btn-primary" data-modal="CJ">+ New Journal</button>
        <button id="hideToggle" type="button" class="btn btn-primary">Show Hidden</button>
    </div>
    <div class="col-md-6">
        <h1 class="pull-xs-left">
            Your Journals
            <a href="/help#journals" class="help-icon" style="color:blue; font-size:14px;">help</a>
        </h1>

    </div>


    <hr/>
    <!-- SEARCH BAR AREA -->
    <div id="searchCollapse" class="row">

        <div class="col-sm-12">
            <h4>Search</h4>
            <div>
                <form method="get" action="{{ route('notebooks.search') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-row col">
                            <div class="col">
                                <input class="form-control" name="journalName" type="text" placeholder="Journal name..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-row col">
                            <div class="col">
                                <label class="col-form-label" for="fromDate">From</label>
                                <input class="datepicker form-control" id="fromDate" name="fromDate" type="text"  placeholder="DD/MM/YYYY">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="toDate">To</label>
                                <input class="datepicker form-control" id="toDate" name="toDate" type="text"  placeholder="DD/MM/YYYY">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input id="hidden" class="form-check-input" name="hidden" type="checkbox" value="1"/>
                                    Show Only Hidden
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <button class="btn btn-primary fl-right" type="submit" role="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr />
    </div>
    @if(!Auth::user()->hasActiveJournals())
    <div class="alert alert-primary" role="alert">
        You have no active Journals.
        @if(Auth::user()->hasHidden())
        <br>You have {{Auth::user()->numHidden()}} hidden journals.
        @endif
        @if (Auth::user()->hasDeleted())
        <br>You have {{Auth::user()->numDeleted()}} deleted journals.
        @endif
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            @foreach ($notes as $noteObj)
            @if(!($noteObj->isDeleted()))
            @if(!($noteObj->isHidden()))
            <div class="col-sm-6 col-md-3 notebook">
                <div class="card p-2">
                    <div class="card-block">

                        <a  class="" href="{{ route('notebooks.show',$noteObj->id) }}">
                            <h4 class="notebook-title">
                                {{ $noteObj->name }}
                            </h4>
                        </a>
                        <a href="#" class="fl-right mt-1" data-toggle="modal" data-modal="EJ" data-id="{{ $noteObj->id }}" data-text="{{ $noteObj->name }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="{{ route('notebooks.show',$noteObj->id) }}">
                        <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook.jpg') }}"/>
                    </a>
                    <div class="card-block pt-2">
                        <button href="#" class="btn btn-sm btn-secondary mx-auto " type="submit" value="Hide" onclick="submitForm('hideJournal-{{$noteObj->id}}');"><i class="fa fa-eye-slash" aria-hidden="true"></i> Hide</button>
                        <button href="#" class="btn btn-sm red mx-auto fl-right" type="submit" value="Delete" onclick="submitForm('deleteJournal-{{$noteObj->id}}');"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                        <form id="deleteJournal-{{$noteObj->id}}" action="{{route('notebooks.delete',  $noteObj->id) }}" class="fl-right card-link" method="POST" style="display:inline">
                            {{ method_field('DELETE') }} <!-- ?? -->
                            {{ csrf_field() }}
                        </form>

                        <form id="hideJournal-{{$noteObj->id}}" action="/notebooks/hide/{{ $noteObj->id }}" class="fl-right card-link" method="POST" style="display:inline">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>

        <!--Hidden Journals-->
        <div class="col-12 hidden-notebook-section">
            @if(Auth::user()->hasHidden())
            <hr>
            <h3>Hidden Journals</h3>
            <hr>
            @endif
            @foreach ($notes as $noteObj)
            @if(!($noteObj->isDeleted()) && ($noteObj->isHidden()))
            <div class="col-sm-6 col-md-3 notebook">

                    <div class="card p-2">
                        <div class="card-block">

                            <a  class="" href="{{ route('notebooks.show',$noteObj->id) }}">
                            <h4 class="notebook-title">
                                {{ $noteObj->name }}
                            </h4>
                            </a>
                            <span class="badge badge-secondary fl-right mt-1">HIDDEN</span>
                        </div>
                        <div class="card-block pt-2">
                            @if($noteObj->isHidden())
                            <button href="#" class="btn btn-sm btn-secondary mx-auto " type="submit" value="Hide" onclick="submitForm('hideJournal');"><i class="fa fa-eye" aria-hidden="true"></i> Show</button>
                            @else
                            <button href="#" class="btn btn-sm btn-secondary mx-auto " type="submit" value="Hide" onclick="submitForm('hideJournal');"><i class="fa fa-eye-slash" aria-hidden="true"></i> Hide</button>
                            @endif
                            <button href="#" class="btn btn-sm red mx-auto fl-right" type="submit" value="Delete" onclick="submitForm('deleteJournal-{{$noteObj->id}}');"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                            <form id="deleteJournal-{{$noteObj->id}}" action="{{route('notebooks.delete',  $noteObj->id) }}" class="fl-right card-link" method="POST" style="display:inline">
                                {{ method_field('DELETE') }} <!-- ?? -->
                                {{ csrf_field() }}
                            </form>

                            <form id="hideJournal" action="/notebooks/hide/{{ $noteObj->id }}" class="fl-right card-link" method="POST" style="display:inline">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!-- /container -->
</div>
@endsection
