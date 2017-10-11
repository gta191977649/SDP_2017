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
    <h1>Recent changes</h1>
    <hr/>
    @php
        $recent = DB::table('users')
            ->join('notebooks', 'users.id', '=', 'notebooks.user_id')
            ->join('notes', 'notes.notebook_id', '=', 'notebooks.id')
            ->join('noterecords', 'noterecords.note_id', '=', 'notes.id')
            ->select('noterecords.title','noterecords.body','noterecords.created_at','notebooks.name')
            ->take(10)
            ->get();
    @endphp
    <table class="table">
    <thead>
      <tr>
        <th>Note title</th>
        <th>Jouneral Name</th>
        <th>create time</th>
      </tr>
    </thead>
    <tbody>
    @foreach($recent as $item)
      <tr>
        <td>{{ $item->title }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->created_at }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection <!-- 结束 -->
