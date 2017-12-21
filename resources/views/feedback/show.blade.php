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
          <h3>View</h3>
          <a href="{{route('feedback.dashboard')}}">Back To Feedback</a>
</div>

<h1>Showing {{$feedback->name}}</h1>
<div class="jumbotron text-left">
        <h2>{{ $feedback->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $feedback->desc }}<br>
            <strong>Created Date:</strong> {{ date('F d, Y', strtotime($feedback->created_at)) }} <br>
            <strong>Last Modified:</strong> {{ date('F d, Y', strtotime($feedback->updated_at)) }} <br>
        </p>
</div>
@endsection