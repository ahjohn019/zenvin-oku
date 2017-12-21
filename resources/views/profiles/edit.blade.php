@extends('layouts.acc_status')
<br><br>
@section('content_allow')
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }} 
        </div>
    @endforeach
@endif
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading"><h4><b>Edit Profile</b></h4></div>
<div class="panel-body">

@if (session('Customer'))
{!! Form::open(['action' => ['ProfilesController@update', $profile->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name')}}
        {{ Form::text('name', $profile->name, ['class' => 'form-control ', 'placeholder' => 'Name'])}}
    </div>
@elseif (session('PrivateSeller'))
{!! Form::open(['action' => ['PrivateProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name')}}
        {{ Form::text('name', $profile->name, ['class' => 'form-control ', 'placeholder' => 'Name'])}}
    </div>
@else
{!! Form::open(['action' => ['OrgProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {{ Form::label('orgName', 'Org Name')}}
        {{ Form::text('orgName', $profile->orgName, ['class' => 'form-control ', 'placeholder' => 'Org Name'])}}
    </div>
@endif
    
    
    <div class="form-group">
        {{ Form::label('contactNo', 'Contact Number')}}
        {{ Form::text('contactNo', $profile->contactNo, ['class' => 'form-control ', 'placeholder' => 'Contact No'])}}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email')}}
        {{ Form::text('email', $user->email, ['class' => 'form-control ', 'placeholder' => 'email'])}}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address')}}
        {{ Form::textarea('address', $profile->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
    </div>
    <div class="form-group">
        {{ Form::label('postCode', 'Postcode')}}
        {{ Form::text('postCode', $profile->postCode, ['class' => 'form-control', 'placeholder' => 'Postcode'])}}
    </div>
    <div class="form-group">
        {{ Form::label('state', 'State')}}
        {!! Form::select('state', $states, $profile->state, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('profile_image', 'Profile Picture')}}
        {{ Form::file('profile_image') }}
    </div>
<hr/>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class' => 'btn btn-primary pull-right'])}}
{!! Form::close() !!}
</div>
</div>
</div>
</div>
@endsection
