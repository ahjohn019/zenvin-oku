@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Organizations</h2>

</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('org.dashboard')}}">Back To Organizations</a>
</div>
<br><br>
@include('include.messages')
<h1>Showing {{$organizations->name}}</h1>
<div class="jumbotron text-left">
        <p>
            <strong>Logo: </strong><img class ="myImg" src="{{asset('images/'.$organizations->image)}}" height="100" weight="150" ><br>
            <strong>Address:</strong> {{ $organizations->addr }}<br>
            <strong>Region:</strong> {{ $organizations->region }}<br>
            <strong>Phone No:</strong> {{ $organizations->phone_no }}<br>
            <strong>Register Date:</strong> {{ $organizations->reg_date }}<br>
            <strong>Artist List: </strong>
            @foreach ($organizations->artist as $artist)
            <span class="label label-default">{{$artist->Name}}</span>
            @endforeach
        </p>
</div>
<div class="panel panel-default">
  <div class="panel panel-heading"><h4><strong>Stores</strong><h4></div>
    <div class="panel panel-body">
      @if(count($stores) > 0)
      <table class="table">
      <tr>
          <td></td>
          <td><strong>Name</strong></td>
          <td><strong>Store Owner</strong></td>
          <td><strong>Contact No</strong></td>
          <td><strong>Address</strong></td>
          <td><strong>Postcode</strong></td>
          <td><strong>State</strong></td>
          <td><strong>Action</strong></td>
      </tr>
          @foreach($stores as $store)
          <tr>
              <td align="center"><img src="/image/stores/{{$store->image}}" style="max-height: 100px" class="img-responsive" ></td>
              <td>{{$store->storeName}}</td>
              @foreach($privates as $private)
              @if($private->id == $store->private_id)
              <td>{{$private->name}}</td>
              <td>{{$private->contactNo}}</td>
              <td>{{$private->address}}</td>
              <td>{{$private->postCode}}</td>
              <td>{{$private->state}}</td>
              @endif
              @endforeach
              <td>{{link_to_route('store.show','View details',[$store->id],['class'=>'btn btn-info'])}}</td>
          </tr>
          @endforeach
          </table>
          @endif
          <div>
            {{link_to_route('organization.addNewStore','Add new store',[$organizations->id],['class'=>'btn btn-primary'])}}
          </div>
    </div>
</div>

{{--EVENT TABLE--}}
<div class="panel panel-default">
  <div class="panel panel-heading"><h4><strong>Events</strong><h4></div>
    <div class="panel panel-body">
<?php $x = 0;$y = 0;$z = 0; ?>
      @foreach($events as $event)
          @if ($event->eventStatus == 'ACTIVE' )<?php $x++; ?>
          @elseif($event->eventStatus == 'DEACTIVE' )<?php $y++; ?>
          @elseif($event->eventStatus == 'PENDING' )<?php $z++; ?>
          @endif
      @endforeach
        <?php $w=$x+$y+$z; ?>
      @if($w > 0)
            <table class="table">
            <tr>
              <td style="padding:5px"><h5>Active: {{$x}}</h5></td><td style="padding:5px"><h5>Deactive: {{$y}}</h5></td><td style="padding:5px"><h5>Pending: {{$z}}</h5> </td>
            </tr>
          <tr>
              <td>Name</td>
              <td>Description</td>
              <td>Image</td>
              <td>StartDate</td>
              <td>EndDate</td>
              <td>TimeHr</td>
              <td>TimeMin</td>
              <td>Duration</td>
              <td>Location</td>
              <td>Type</td>
              <td>Price</td>
              <td>Status</td>
              <td></td>
          </tr>

          @foreach($events as $event)
          @if($event->eventStatus == 'ACTIVE' || $event->eventStatus == 'DEACTIVE')
              <tr>
                  <td>{{$event->eventName}}</td>
                  <td>{{$event->eventDesc}}</td>
                  <td><img src="/image/events/{{$event->eventImage}}" style="max-height:100px"></td>
                  <td>{{$event->eventStartDate}}</td>
                  <td>{{$event->eventEndDate}}</td>
                  <td>{{$event->eventTimeHr}}</td>
                  <td>{{$event->eventTimeMin}}</td>
                  <td>{{$event->eventDuration}}</td>
                  <td>{{$event->eventLocation}}</td>
                  <td>{{$event->eventType}}</td>
                  <td>{{$event->eventPrice}}</td>
                  <td>{{$event->eventStatus}}</td>
                  <td>{!! Form::open(array('route'=>['events.destroy',$event->id], 'method'=>'DELETE')) !!}
                    {{link_to_route('events.edit','Edit',[$event->id],['class'=>'btn btn-primary'])}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}</td>

              </tr>
              @elseif ($event->eventStatus == 'PENDING')
              <tr>
                <td>{{$event->eventName}}</td>
                <td>{{$event->eventDesc}}</td>
                <td><img src="/image/events/{{$event->eventImage}}" style="max-height:100px"></td>
                <td>{{$event->eventStartDate}}</td>
                <td>{{$event->eventEndDate}}</td>
                <td>{{$event->eventTimeHr}}</td>
                <td>{{$event->eventTimeMin}}</td>
                <td>{{$event->eventDuration}}</td>
                <td>{{$event->eventLocation}}</td>
                <td>{{$event->eventType}}</td>
                <td>{{$event->eventPrice}}</td>
                <td>{{$event->eventStatus}}</td>
                  <td>{!! Form::open(array('route'=>['events.destroy',$event->id], 'method'=>'DELETE')) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}</td>

              </tr>
            @endif
          @endforeach
          </table>
          @else
          <h4>No record found!</h4>
          @endif
          {{link_to_route('organization.addNewEvent','Add new Event',[$organizations->id],['class'=>'btn btn-primary'])}}

    </div>
</div>


@endsection
