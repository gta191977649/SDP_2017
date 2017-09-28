@extends('layouts/base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" ng-app="">
                <h4 class="card-header bg-primary text-white">Register</h4>
                <div class="card-body">
                    {{-- Angular Vaildation alert --}}

                    <div class="alert alert-danger" role="alert" ng-show="password != password_again">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        You entered password does not match each other!
                    </div>

                    <div class="alert alert-danger" role="alert" ng-show="regForm.email.$invalid && regForm.email.$dirty">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Please enter vailed email.
                    </div>

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" name="regForm">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <label for="name" class="control-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" ng-model="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>


                            <input id="email" type="email" class="form-control" name="email" ng-model="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">Password</label>


                            <input id="password" type="password" class="form-control" name="password" ng-model="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>


                            <input id="password-confirm" type="password" ng-model="password_again" class="form-control" name="password_confirmation" required>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" ng-disabled="regForm.name.$invalid || regForm.email.$invalid || regForm.password.$invalid || regForm.password_again.$invalid || password_again != password">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection
