@extends('admin.profile')

@section('content')
@if (Session::has('message'))
 <div class="col-md-12">
 <div class="alert alert-info">
 {{ Session::get('message') }}
 </div>
 </div>
@endif
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu" >
    </a>Artist List</span></h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Artist</h3>
          <a href="{{route('artist.create')}}">Create New</a>
          <a href="#">View All</a>
          <a href="{{route('admin.dashboard')}}">Back To Admin</a>
</div>

<!-- Search--> 
<div class="col-md-5 text-left">
<form action="{{route('artist.dashboard')}}" method="get" class="form-inline">
<div class="form-group"><i class="fa fa-search" aria-hidden="true"></i>
<input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
<div class="form-group">
<button class="btn btn-success" type="submit">Search</button>
</div>
</form>

</div>
</div>
<br><br>
<table class="table table-bordered ">
  <thead>
    <tr class="bg-primary">
      <th>ID</th>
      <th>Artist Image</th>
      <th>Name</th>
      <th>Email</th>
      <th>Talent</th>
      <th>Service</th>
      <th>Handicraft</th>
 
      
    </tr>
  </thead>
  <tbody>

  @foreach($artists as $artist)

   <tr>
      <th scope="row">{{$artist->id}}</th>
      <td><img class ="myImg" src="{{asset('images/'.$artist->image)}}" style="max-height:133px;margin:10px;" ></td>
      <td>{{$artist->Name}}</td>
      <td>{{$artist->Email}}</td>
      <td>{{$artist->Talent}}</td>
      <td>{{$artist->Service}}</td>
      <td>{{$artist->Handicraft}}</td>
      
      <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
      
      <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
      <td><a href="{{URL::to('artist/show/' . $artist->id)}}" class="btn btn-small btn-success" >View</a></td>
      <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
      @if(Auth::user()->id == $artist->admin_id).<!-- authenticate user id for permission to delete -->
      <td><a href="{{URL::to('artist/edit/' . $artist->id)}}" class="btn btn-small btn-info" >Update</a></td>
       <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
      
      <td> 
      {!! Form::open(['method' => 'DELETE','route' => ['artist.delete', $artist->id]]) !!}
      <div class="form-group">
      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
      </td>
      
      @endif
    </tr>
    @endforeach
  </tbody>
</table>


{{$artists->appends(['s'=>$s])->links()}}
<!--{{$artists->links()}}-->
@endsection