@extends('layouts.acc_status')
@section('content_allow')
<br><br><br><br>
    <div class="container">
    @if(session('update-success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('update-success') }}</strong>
    </div>
    @endif
    <div class="panel-group">
    <div class="panel panel-info">
        @if(!isset($user)||$user->user_type=='Admin')
        <div class="panel-heading">
            <strong>Error</strong>
        <div class="panel-body">
            <p>Sorry, We couldn't find the user. Plese click <a href="/">here</a> to back to home page.</p>
        </div>
        @else
        <div class="panel-heading">
            <div style="overflow:auto;position:relative;">


                <img style="width:100px;height:100px;border-radius:50%;float:left;" hspace="20" align="middle" src="{{asset('storage/profile_images/customers/'.$profiles->profile_image)}}">

                <h3 style="float:left;">&nbsp;&nbsp;{{$user->username}}'s profile</h3>
                @if($user->username == Auth::user()->username)
                <div style="position: absolute; bottom: 0;right:0;">
                    <a class="btn btn-default" href="/changepassword" role="button">Change Password</a>
                    <a class="btn btn-default" href="/profiles/{{$user->username}}/edit" role="button">Edit Profile</a>
                </div>
                @endif
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="container col-sm-6 col-md-6">
                    <h4>Account Details</h4>
                    <table class="table table-bordered">
                        <tr>
                        <th>Username</th>
                        <td>{{$user->username}}</td>
                        </tr>
                        <tr>
                        <th>Email</th>
                        <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                        <th>User Type</th>
                        <td>{{$user->user_type}}</td>
                        </tr>
                        <tr>
                        <th>Join At</th>
                        <td>{{$user->created_at->toDateString()}}</td>
                        </tr>
                        <tr>
                        <th>Last Login At</th>
                        <td>{{$user->last_login_at}}</td>
                        </tr>
                    </table>
                </div>

                <div class="container col-sm-6 col-md-6">
                    <h4>
                    @if($user->username == Auth::user()->username)
                    My
                    @else
                        @if($profiles->gender == 'Male')
                        His
                        @else
                        Her
                        @endif
                    @endif
                    Profile
                    </h4>
                    <table class="table table-bordered">
                        <tr>
                        <th>Name</th>
                        <td>{{$profiles->name}}</td>
                        </tr>
                        <tr>
                        <th>Gender</th>
                        <td>{{$profiles->gender}}</td>
                        </tr>
                        <tr>
                        <th>NRIC</th>
                        <td>{{$profiles->nric}}</td>
                        </tr>
                        <tr>
                        <th>Contact Number</th>
                        <td>{{$profiles->contactNo}}</td>
                        </tr>
                        <tr>
                        <th>Address</th>
                        <td><textarea rows="3" cols="50" readonly="readonly" style="border: none;resize: none;">{{$profiles->address}}</textarea></td>
                        </tr>
                        <tr>
                        <th>Postcode</th>
                        <td>{{$profiles->postCode}}</td>
                        </tr>
                        <tr>
                        <th>State</th>
                        <td>{{$profiles->state}}</td>
                        </tr>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
    </div>
@endsection
