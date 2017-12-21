@extends('admin.profile')

@section('content')

<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Organizations</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Create New</h3>
          <a href="{{route('org.dashboard')}}">Back To Organizations</a>
</div>


{{ Html::ul($errors->all()) }}
{{ Form::open(array('url' => 'org/create','enctype' => 'multipart/form-data','files'=> true)) }}
<div class="form-group">
        {{ Form::label('name', 'Name :')}}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description :')}}
        {{ Form::textarea('desc', Input::old('desc'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('addr', 'Address :')}}
        {{ Form::text('addr', Input::old('addr'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('region', 'Region :')}}
        {{ Form::text('region', Input::old('region'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('phone_no', 'Phone No :')}}
        {{ Form::text('phone_no', Input::old('phone_no'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('verified', 'Verified :')}}
        {{ Form::select('verified', array('yes' => 'Yes', 'no' => 'No') )}}
</div>
<div class="form-group">
        {{ Form::label('reg_date', 'Register Date :')}}
        {{ Form::text('reg_date', Input::old('reg_date'), array('id' => 'datepicker3')) }}
</div>
<div class="form-group">
    {!! Form::label('Organization Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
{{ Form::label('artists', 'Artists:') }}
    <select class="form-control select2-multi" name="artists[]" multiple="multiple">
	@foreach($artists as $art)
	<option value='{{ $art->id }}'>{{ $art->Name }}</option>
	@endforeach
     </select>
</div>

<div class="form-group"> 
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}

@endsection
