@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Feedback</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Create New</h3>
          <a href="{{route('hand.dashboard')}}">Back To Handicraft</a>
</div>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url' => 'feedback/create')) }}
<div class="form-group">
        {{ Form::label('name', 'Name :')}}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description :')}}
        {{ Form::textarea('desc', Input::old('desc'), array('class' => 'form-control')) }}
</div>
<div class="form-group"> 
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}
@endsection