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
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span></h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>User Type</h3>
          <a href="{{route('usertype.create')}}">Create New</a>
          <a href="#">View All</a>
          <a href="{{route('admin.dashboard')}}">Back To Admin</a>
</div>

<!-- Search -->
<div class="col-md-5 text-left">
<form action="{{route('usertype.dashboard')}}" method="get" class="form-inline">
<div class="form-group"><i class="fa fa-search" aria-hidden="true"></i>
<input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
<div class="form-group">
<button class="btn btn-success" type="submit">Search</button>
</div>
</form>

</div>
</div>

<table class="table table-striped table-bordered">


<thead>
    <tr class="bg-primary">
      <th>Id</th>
      <th>Types</th>
      <th>Description</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone No</th>
    </tr>
  </thead>

<tbody>
@foreach($usertypes as $usertype)
<tr>
<th scope="row">{{$usertype->id}}</th>
      <td class="bg-info" >{{$usertype->types}}</td>
      <td>{{$usertype->desc}}</td>
      <td class="bg-info">{{$usertype->name}}</td>
      <td>{{$usertype->email}}</td>
      <td class="bg-info">{{$usertype->phone_no}}</td>
      
      <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
     
    
      <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
      <td><a href="{{URL::to('usertype/show/' . $usertype->id)}}" class="btn btn-small btn-success" >View</a></td>
      <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
      @if(Auth::user()->id == $usertype->admin_id).<!-- authenticate user id for permission to delete -->
      <td><a href="{{URL::to('usertype/edit/' . $usertype->id)}}" class="btn btn-small btn-info" >Update</a></td>
       <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
       <td> 
       {!! Form::open(['method' => 'DELETE','route' => ['usertype.delete', $usertype->id]]) !!}
       {!! Form::submit('Delete ?', ['class' => 'btn btn-danger']) !!}
       {!! Form::close() !!}
       </td>
       @endif
    </tr>
@endforeach
</tbody>
</table>
{{$usertypes->appends(['s'=>$s])->links()}}
@endsection