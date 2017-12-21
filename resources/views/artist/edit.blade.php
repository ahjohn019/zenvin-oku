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
          <a href="{{route('artist.dashboard')}}">Back To Artist</a>
</div>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($artists, array('route' => array('artist.update', $artists->id), 'method' => 'PUT','files'=>true)) }}
<div class="form-group">
        {{ Form::label('Name', 'Name :')}}
        {{ Form::text('Name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Email', 'Email :')}}
        {{ Form::text('Email', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Talent', 'Talent :')}}
        {{ Form::text('Talent', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Service', 'Service :')}}
        {{ Form::text('Service', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('Handicraft', 'Handicraft :')}}
        {{ Form::text('Handicraft', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {!! Form::label('Artist Image') !!}
    {!! Form::file('image', null) !!}
</div>
<div class="form-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}

@endsection