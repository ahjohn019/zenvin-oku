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
          <h3>Feedback</h3>
          <a href="{{route('feedback.create')}}">Create New</a>
          <a href="#">View All</a>
          <a href="{{route('admin.dashboard')}}">Back To Admin</a>
</div>

<!-- Search -->
<div class="col-md-5 text-left">
<form action="{{route('feedback.dashboard')}}" method="get" class="form-inline">
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
      <th>Name</th>
      <th>Description</th>
      <th>Created Date</th>
      <th>Last Modified</th>
    </tr>
</thead>
<tbody>
@foreach($feedback as $feed)
<tr>
     <td class="bg-info" >{{$feed->name}}</td>
     <td>{{$feed->desc}}</td>
     <td class="bg-info" >{{ date('F d, Y', strtotime($feed->created_at)) }} </td>
     <td>{{ date('F d, Y', strtotime($feed->updated_at)) }}</td>
     <!-- we will also add show, edit, and delete buttons -->
      

                <!-- delete the nerd (uses the destroy method DESTROY /handicrafts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /handicrafts/{id} -->
                <td><a class="btn btn-small btn-success" href="#">View</a></td>
                @if(Auth::user()->id == $feed->admin_id).<!-- authenticate user id for permission to delete -->
                <!-- edit this nerd (uses the edit method found at GET /handicrafts/{id}/edit -->
                <td><a class="btn btn-small btn-info" href="#">Edit</a></td>
                <td> 
                {!! Form::open(['method' => 'DELETE','route' => ['feedback.delete', $feed->id]]) !!}
                {!! Form::submit('Delete ?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                </td>
                @endif
                </tr>
@endforeach
</tbody>
</table>

{{$feedback->appends(['s'=>$s])->links()}}
@endsection