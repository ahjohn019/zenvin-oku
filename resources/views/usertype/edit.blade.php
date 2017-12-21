@extends('admin.profile')


@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Edit</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Edit</h3>
          <a href="{{route('usertype.dashboard')}}">Back To User Types</a>
</div>
@if(auth()->user()->id==$usertypes->admin_id)
{{ Html::ul($errors->all()) }}
{{ Form::model($usertypes, array('route' => array('usertype.update', $usertypes->id), 'method' => 'PUT')) }}
<div class="form-group">
        {{ Form::label('types', 'Types :')}}
        {{ Form::select('types', array('artist' => 'Artist', 'applicant' => 'Applicant'), null )}}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description') }}
        {{ Form::textarea('desc', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('phone_no', 'Phone No') }}
        {{ Form::text('phone_no', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
</div>
@else
<div class="alert alert-danger">
<strong>Sorry! </strong> You are unavailable to edit other user content
</div>
@endif
{{ Form::close() }}
@endsection
