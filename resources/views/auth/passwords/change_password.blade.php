@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('password-error'))
        <div class="alert alert-danger">
            {{ Session::get('password-error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Change Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('change/password') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
                            <label for="passwordold" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="passwordold" required autofocus>

                                @if ($errors->has('passwordold'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passwordold') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                            <label for="newpassword" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control" name="newpassword" required>

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newpassword_confirmation" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="newpassword-confirm" type="password" class="form-control" name="newpassword_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>

                                <a href="/" class="btn btn-default btn-close">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
