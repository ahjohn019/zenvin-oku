@extends('admin.profile')

@section('content')

<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create User Type</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('usertype.dashboard')}}">Back To UserType</a>
</div>

<h1>Showing: {{$usertypes->name}}</h1>
<div class="jumbotron text-left">
        <h2>{{ $usertypes->name }}</h2>
        <p> 
            <strong>Type:</strong> {{ $usertypes->type }}<br>
            <strong>Description:</strong> {{ $usertypes->desc }}<br>
            <strong>Name:</strong> {{ $usertypes->name }}<br>
            <strong>Email:</strong> {{ $usertypes->email }}<br>
            <strong>Phone No:</strong> {{ $usertypes->phone_no }}<br>
        </p>
</div>
@endsection
