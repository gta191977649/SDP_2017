@extends('layouts/base')
@section('content')
            <!-- /navbar -->
            <!-- Main component for call to action -->
            <div class="container">
                <!-- heading -->
                <div class="pull-xs-right float-right">
                    <a class="btn btn-primary" href="notebooks/create" role="button">
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
                
                <!-- ================ Notebooks==================== -->
                <!-- notebook1 -->
                
                    
                <div class="row">
                    @foreach ($notes as $noteObj)
                    <div class="col-sm-6 col-md-3 ">
                        <div class="card p-2">
                            <div class="card-block">
                                <a href="#">
                                    <h4 class="card-title">
                                        {{ $noteObj->name }}
                                    </h4>
                                </a>
                            </div>
                            <a href="#">
                                <img alt="Responsive image" class="img-fluid" src="{{ asset('dist/img/notebook.jpg') }}"/>
                            </a>
                            <div class="card-block pt-2">
                                <a class="card-link" href="notebooks/{{ $noteObj->id }}">
                                    Edit Notebook
                                </a>
                                <form  action="/notebooks/{{ $noteObj->id }}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                                    {{ method_field('DELETE') }} <!-- ?? -->
                                    {{ csrf_field() }}
                                    <input class="btn btn-sm btn-danger float-right" type="submit" value="Delete">
                                    </input>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
               </div>
            </div>
            <!-- /container -->

@endsection