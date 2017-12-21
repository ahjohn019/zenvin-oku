@extends('admin.profile')

@section('content')
<br><br>
@if (Session::has('message'))
 <div class="col-md-12">
 <div class="alert alert-info">
 {{ Session::get('message') }}
 </div>
 </div>
@endif

<div class="container">
<div class="page-header" id="features">
         <h2 ><span style="font-size:30px;cursor:pointer;" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a>Organization Lists</span></h2>
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Organization</h3>
          <a href="{{route('org.create')}}">Create New</a>
          <a href="#">View All</a>
          <a href="{{route('admin.dashboard')}}">Back To Admin</a>
</div>

<!-- Search -->
<div class="col-md-5 text-left">
<form action="{{route('org.dashboard')}}" method="get" class="form-inline">
<div class="form-group"><i class="fa fa-search" aria-hidden="true"></i>
<input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
<div class="form-group">
<button class="btn btn-success" type="submit">Search</button>
</div>
</form>

</div>
</div>

<br><br>
<table class="table table-bordered " >
  <thead>
    <tr class="bg-primary">
      
      <th>Name</th>
      <th>Description</th>
      <th>Address</th>
      <th>Region</th>
      <th>Phone Number</th>
      <th>Verified</th>
      <th>Register Date</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

  @foreach($organizations as $org)

    <tr>
      
      <td class="bg-primary">{{$org->name}}</td>
      <td>{{$org->desc}}</td>
      <td>{{$org->addr}}</td>
      <td>{{$org->region}}</td>
      <td>{{$org->phone_no}}</td>
      <td>{{$org->verified}}</td>
      <td>{{$org->reg_date}}</td>
      <td><img class ="myImg" src="{{asset('images/'.$org->image)}}" style="max-height:90px;" ></td>
      <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->

      <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
      <td><a href="{{URL::to('org/show/' . $org->id)}}" class="btn btn-small btn-success" >View</a></td>
      <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
      @if(Auth::user()->id == $org->admin_id).<!-- authenticate user id for permission to delete -->
      <td><a href="{{URL::to('org/edit/' .$org->id)}}" class="btn btn-small btn-info" >Update</a></td>
       <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->

      <td>
      {!! Form::open(['method' => 'DELETE','route' => ['org.delete', $org->id]]) !!}
      <div class="form-group">
      {!! Form::submit('Delete ?', ['class' => 'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
      </td>

      @endif
    </tr>
    @endforeach
  </tbody>
</table>


{{$organizations->appends(['s'=>$s])->links()}}
@endsection
