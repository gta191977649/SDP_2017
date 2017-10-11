@extends('layouts/ucp')<!-- 继承样式 -->
@section('content')<!-- 定义单独页面样式 -->
    <h1>My Jounerals</h1>
    <hr/>
    <div class="row text-center">
        <div class="col-sm-4 text-primary">
            <i class="fa fa-book fa-5x"></i>
            <h2>Total Jounerals</h2>
            <h1>{{ Auth::user()->notebooks->count() }}</h1>
        </div>
        <div class="col-sm-4 text-success">
            <i class="fa fa-sticky-note fa-5x" aria-hidden="true"></i>
            <h2>Total Notes</h2>
            <h1>{{ Auth::user()->notesTotal() }}</h1>
            

        </div>
        <div class="col-sm-4 text-danger">
            <i class="fa fa-trash fa-5x" aria-hidden="true"></i>

            <h2>Deleted or hidden</h2>
            <h1>{{ Auth::user()->deteledTotal() }} </h1>
        </div>
  </div>
@endsection <!-- 结束 -->
