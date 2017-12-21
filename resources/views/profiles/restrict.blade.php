@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session('access-denied'))
            <div class="alert alert-danger">
                    <strong>{{ Session::get('access-denied') }}</strong>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Error</div>
            <div class="panel-body">
                <strong>Sorry, you are unable to access to the page. Plese click <a href="/">here</a> to back to home page.</strong>
            </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
