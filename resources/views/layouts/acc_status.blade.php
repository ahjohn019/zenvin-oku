@extends('layouts.app')
<br><br>
@section('content')
@if(Auth::check())
    <!-- If user is organization seller -->
    @if(Auth::user()->user_type == 'OrgSeller')
        @if(Auth::user()->activated == false)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Your account is not activated</strong>
                            </div>
                            <div class="panel-body">
                                <p>Sorry, you are unable to use functions on this website if your account is not activated</p>
                                <p>Plese click <a href="/">here</a> to back to home page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->isExpired() <= 31 && Auth::user()->isExpired() >= 0)
            <div class="container">
                <div class="alert alert-warning">
                <strong>Your membership has {{Auth::user()->isExpired()}} days left until it expired - please renew your membership.</strong> 
            </div>
            @yield('content_allow')
        @elseif(Auth::user()->isExpired() < 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Please renew your membership</strong>
                            </div>
                            <div class="panel-body">
                                <p>Sorry, you are not longer allowed to use functions on this website because your membership has expired.</p>
                                <p>Please renew your membership.</p>
                                <p>Plese click <a href="#">here</a> to proceed to payment page.</p>
                                {!! Form::open(['route' => ['membership-renew', Auth::user()->membership->id], 'method' => 'PUT']) !!}
                                {{Form::submit('Renew Membership',['class' => 'btn btn-primary pull-right'])}}
                                {!! Form::close() !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @yield('content_allow')
        @endif
    <!-- Endif user is organization seller -->

    <!-- If user is private seller -->
    @elseif(Auth::user()->user_type == 'PrivateSeller')
        @if(Auth::user()->isOrgActivated() == false)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Your organization's account is not activated</strong>
                            </div>
                            <div class="panel-body">
                                <p>Sorry, you are unable to use functions on this website if your organization's account is not activated.</p>
                                <p>Plese click <a href="/">here</a> to back to home page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->activated == false)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Your account is not activated</strong>
                            </div>
                            <div class="panel-body">
                                <p>Sorry, you are unable to use functions on this website if your account is not activated</p>
                                <p>Plese click <a href="/">here</a> to back to home page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->isOrgExpired() <= 31 && Auth::user()->isOrgExpired() >= 0)
            <div class="container">
                <div class="alert alert-warning">
                <strong>Your organization's membership has {{Auth::user()->isOrgExpired()}} days left until it expired - please ask your organization to renew their membership</strong>
            </div>
            @yield('content_allow')
        @elseif(Auth::user()->isOrgExpired() < 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Your organization's membership is expired</strong>
                            </div>
                            <div class="panel-body">
                                <p>Sorry, you are unable to use functions on the website because your organization's membership is expired.</p>
                                <p>Plese click <a href="/">here</a> to back to home page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @yield('content_allow')
        @endif
    <!-- Endif user is private seller -->

    <!-- If user is customer -->
    @elseif(Auth::user()->user_type == 'Customer')
        @if(Auth::user()->activated == false)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Your account is not activated</strong>
                            </div>
                            <div class="panel-body">
                                <p>Sorry, your account need to be activated in order for you to use functions on the website.</p>
                                <p>Plese click <a href="/">here</a> to back to home page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @yield('content_allow')
        @endif
        <!-- Endif user is customer -->

    <!-- If user is admin or guest -->    
    @else
        @yield('content_allow')
    @endif
@endif
@endsection