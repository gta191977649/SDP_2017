@extends('layouts/ucp')
@section('content')
    <h1>My Profile</h1>
    <hr/>

    <table class="table table-user-information">
        <tbody>
            <tr>
            <td>Name</td>
            <td>{{$user->name}}</td>
            </tr>
            <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
            </tr>
            <tr>
            <td>Join Time</td>
            <td>{{$user->created_at}}</td>
            </tr>
        </tbody>
    </table>

@endsection