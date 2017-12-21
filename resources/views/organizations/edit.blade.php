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
          <a href="{{route('org.dashboard')}}">Back To Organizations</a>
</div>
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($organizations, array('route' => array('org.update', $organizations->id), 'method' => 'PUT','files'=>true)) }}
<div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description :') }}
        {{ Form::textarea('desc', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('addr', 'Address') }}
        {{ Form::text('addr', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('region', 'Region') }}
        {{ Form::text('region', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('phone_no', 'Phone No') }}
        {{ Form::text('phone_no', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('verified', 'Verified :')}}
        {{ Form::select('verified', array('yes' => 'Yes', 'no' => 'No'), null )}}
</div>
<div class="form-group">
        {{ Form::label('reg_date', 'Register Date') }}
        {{ Form::text('reg_date', null, array('id' => 'datepicker3')) }}
</div>
<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
</div>
<div class="form-group">
{{ Form::label('artists', 'Artist:', ['class' => 'form-spacing-top']) }}
{{ Form::select('artists[]', $artists, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
</div>
<div class="form-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}

@endsection