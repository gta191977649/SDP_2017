@extends('layouts/ucp')<!-- 继承样式 -->
@section('content')<!-- 定义单独页面样式 -->
    <h1>Apperence</h1>
    <hr/>
    <form action="{{ route('ucp.setting.theme')}}" method="post">
        <div class="form-group" >
            {{ csrf_field() }}
            <label for="theme">Theme: {{ isset(Auth::user()->setting->theme) ? Auth::user()->setting->theme : 0  }}</label>
            <select class="form-control" id="theme" name="theme">
            <option value="0">Material Design (default)</option>
            <option value="1">Dark</option>
     
            
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
@endsection