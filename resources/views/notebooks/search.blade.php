@extends('layouts/base')
@section('content')
    <!-- /navbar -->
    <!-- Main component for call to action -->
    <div class="container-fluid">

        <!-- heading -->
        <div id="newJournalButton" class="pull-xs-right fl-right">
            <button type="button" class="btn btn-primary" onclick="showsearch()">
                <i id="slideIcon" class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button type="button" class="btn btn-primary" data-modal="CJ">+ New Journal</button>
            </div>
            <h1 class="pull-xs-left">
                Your Journals
            </h1>

            <hr/>
            <!-- SEARCH BAR AREA -->
            <div class="row">

                <div class="col-sm-12">
                    <div id="searchCollapse">
                        <h4>Search</h4>
                        <div>
                            <form method="get" action="{{ route('notebooks.search') }}">
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

                                <div class="form-group float-right">
                                    <button class="btn btn-primary " type="submit" role="button">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            @if($notes->where("deleted_at",NULL)->count() == 0)
                <div class="alert alert-primary" role="alert">
                    You have no Journals.

                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    @foreach ($notes as $noteObj)
                        @if(!($noteObj->trashed()))
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
                                    <a href="#">
                                        <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook.jpg') }}"/>
                                    </a>
                                    <div class="card-block pt-2">
                                        <button href="" class="btn btn-sm btn-secondary mx-auto " type="submit" value="Hide" onclick="event.preventDefault(); document.getElementById('hideJournal').submit();"><i class="fa fa-eye-slash" aria-hidden="true"></i> Hide</button>
                                        <button href="" class="btn btn-sm red mx-auto fl-right" type="submit" value="Delete" onclick="event.preventDefault(); document.getElementById('deleteJournal').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        <form id="deleteJournal" action="/notebooks/{{ $noteObj->id }}" class="fl-right card-link" method="POST" style="display:inline">
                                            {{ method_field('DELETE') }} <!-- ?? -->
                                            {{ csrf_field() }}
                                        </form>
                                        <form id="hideJournal" action="/notebooks/{{ $noteObj->id }}" class="fl-right card-link" method="POST" style="display:inline">
                                            {{ method_field('DELETE') }} <!-- ?? -->
                                            {{ csrf_field() }}
                                        </form>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <hr/>
                <h2 class="hidden-notebook-title pull-xs-left">Hidden Journals <button id="hideToggle" class="btn btn-primary" role="button" value="">Show Hidden Journals</button></h2>
                <hr/>
            </div>
            <div class="col-12">
                <div class="notebook-hidden">
                    @foreach ($notes as $noteObj)

                        @if(($noteObj->isHidden()) && !($noteObj->isDeleted()))
                            <div class="col-3 notebook ">
                                <div class="card p-2">
                                    <div class="card-block">
                                        <a href="{{ route('notebooks.show',$noteObj->id) }}">
                                            <h4 class="notebook-title">
                                                {{ $noteObj->name }}
                                            </h4>
                                        </a>
                                        <span class="badge badge-secondary fl-right mt-1">HIDDEN</span>
                                        <!--
                                            <span class="badge badge-danger fl-right mt-1">REMOVED</span>
                                        -->
                                    </div>
                                    <a href="#">
                                        <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook-del.jpg') }}"/>
                                    </a>
                                    <div class="card-block pt-2"></div>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <hr/>
                <h2 class="hidden-notebook-title pull-xs-left">Hidden Journals <button id="hideToggle" class="btn btn-primary" role="button" value="">Show Hidden Journals</button></h2>
                <hr/>
            </div>
            <div class="col-12">
                <div class="notebook-hidden">
                    @foreach ($notes as $noteObj)

                        @if(!($noteObj->isHidden()) && ($noteObj->isDeleted()))
                            <div class="col-3 notebook ">
                                <div class="card p-2">
                                    <div class="card-block">
                                        <a href="{{ route('notebooks.show',$noteObj->id) }}">
                                            <h4 class="notebook-title">
                                                {{ $noteObj->name }}
                                            </h4>
                                        </a>
                                        <span class="badge badge-secondary fl-right mt-1">HIDDEN</span>
                                        <!--
                                            <span class="badge badge-danger fl-right mt-1">REMOVED</span>
                                        -->
                                    </div>
                                    <a href="#">
                                        <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook-del.jpg') }}"/>
                                    </a>
                                    <div class="card-block pt-2"></div>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>

            </div>
        </div>
        <!-- /container -->
    </div>
@endsection
