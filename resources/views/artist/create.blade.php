@extends('admin.profile')

@section('content')

<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Artists</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Create New</h3>
          <a href="{{route('artist.dashboard')}}">Back To Artist</a>
</div>


{{ Html::ul($errors->all()) }}
{{ Form::open(array('url' => 'artist/create','enctype' => 'multipart/form-data','files'=> true)) }}
<div class="form-group">
        {{ Form::label('Name', 'Name :')}}
        {{ Form::text('Name', Input::old('Name'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Email', 'Email :')}}
        {{ Form::text('Email', Input::old('Email'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Talent', 'Talent :')}}
        {{ Form::text('Talent', Input::old('Talent'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Service', 'Service :')}}
        {{ Form::text('Service', Input::old('Service'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Handicraft', 'Handicraft :')}}
        {{ Form::text('Handicraft', Input::old('Handicraft'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {!! Form::label('Artist Image') !!}
    {!! Form::file('image', null) !!}
</div>


<div class="form-group"> 
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}



@endsection