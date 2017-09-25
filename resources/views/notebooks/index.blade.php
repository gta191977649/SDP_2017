@extends('layouts/base')
@section('content')
    <!-- /navbar -->
    <!-- Main component for call to action -->
    <div class="container">
        <!-- heading -->
        <div class="pull-xs-right float-right">
            <a class="btn btn-primary" href="{{ route('notebooks.create') }}" role="button">
                New NoteBook +
            </a>
        </div>
        <h1 class="pull-xs-left">
            Your Notebooks
        </h1>

        <hr/>
        @if($notes->count() == 0)
            <div class="alert alert-primary" role="alert">
                You have no notebooks.
            </div>
        @endif

        <br>

        <div class="row">
            @foreach ($notes as $noteObj)
                @if($noteObj->trashed())
                    <div class="col-sm-6 col-md-3 ">
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
                @else
                    <div class="col-sm-6 col-md-3 ">
                        <div class="card p-2">
                            <div class="card-block">

                                <a  href="{{ route('notebooks.show',$noteObj->id) }}">
                                    <h4 class="notebook-title">
                                        {{ $noteObj->name }}
                                    </h4>
                                </a>
                                <a class="pull-right card-edit-link " href="{{ route('notebooks.edit',$noteObj->id) }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
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
</div>
<!-- /container -->

@endsection
