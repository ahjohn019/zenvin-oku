@extends('master.marketmenu')

@section('content')
<div class="container">
<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Menu</h3>
          <a href="#">DashBoard</a>
          <a href="#">Product</a>
          <a href="#">Event</a>
          <a href="#">Service</a>
        </div>
    <span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a>&nbsp;&nbsp;USER</span>

 <div class="row">  
    <div class="col-md-4 col-md-offset-4">
        <h1>User Dashboard</h1>
        <div class="panel-body">
        @component('components.who')
         @endcomponent
        </div>
    </div>
  </div>
</div>
@endsection