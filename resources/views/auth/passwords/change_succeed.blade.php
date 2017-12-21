@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(!isset($success))
            <div class="alert alert-danger">
                <strong>Sorry, we couldn't find that!</strong>
            </div>
            @endif
            <div class="panel panel-default">
            @if(isset($success))
            <div class="panel-heading">
                <strong>{{ $success }}</strong>
            </div>
            <div class="panel-body">
                <p>Click the buttons to back to home page or re-login.</p>
                <div class="col-md-6 col-md-offset-4">    
                    <p>
                    <a class="btn btn-primary btn-lg" href="/" role="button">Home</a>
                    <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Login</a>
                    </p>
                </div>
            </div>
            @else
            <div class="panel-heading">
                <strong>Error 404</strong>
            </div>
            <div class="panel-body">
                <strong>Sorry, we could not locate the page you are requesting to view. Plese click <a href="/">here</a> to back to home page.</strong>
            </div>
            @endif
            </div>
        </div>
    </div>
</div>

@endsection
