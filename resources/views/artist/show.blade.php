@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Artist</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('artist.dashboard')}}">Back To Artist</a>
</div>

<h1>Showing Artist of Organization : {{$artists->Name}}</h1>
<div class="jumbotron text-left">
        <!--<h2>{{ $artists->Name }}</h2>-->
        <p>
            <strong>Artist Image:</strong><img class ="myImg" src="{{asset('images/'.$artists->image)}}" height="125" weight="125" ><br>
            <strong>Name:</strong> {{ $artists->Name }}<br>
            <strong>Email:</strong> {{ $artists->Email }}<br>
            <strong>Talent:</strong> {{ $artists->Talent }}<br>
            <strong>Service:</strong> {{ $artists->Service }}<br>
            <strong>Handicraft:</strong> {{ $artists->Handicraft }}<br>
          
        </p>
</div>

@endsection