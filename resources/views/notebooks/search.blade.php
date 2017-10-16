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
                Search Results...
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
                                                <input id="hidden" class="form-check-input" name="hidden" type="checkbox" value="1">
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
            @if((count($notes)==0))
                <div class="alert alert-primary" role="alert">
                    No Journals matched your criteria
                </div>
            @endif

            <!--Hidden-->
            <div class="row">
                <div class="col-12">
                    @foreach ($notes as $noteObj)
                        <div class="col-sm-6 col-md-3 notebook">
                            <div class="card p-2">
                                <div class="card-block">

                                    <a  class="" href="{{ route('notebooks.show',$noteObj->id) }}">
                                        <h4 class="notebook-title">
                                            {{ $noteObj->name }}
                                        </h4>
                                    </a>
                                    @if($noteObj->isHidden())
                                        <span class="badge badge-secondary fl-right mt-1">HIDDEN</span>
                                    @elseif ($noteObj->isDeleted())
                                        <span class="badge badge-danger fl-right mt-1">REMOVED</span>
                                    @endif
                                </div>
                                <a href="#">
                                    <img alt="Responsive image" class="img-fluid" src="{{ asset('img/notebook.jpg') }}"/>
                                </a>
                                <div class="card-block pt-2">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endsection
