@extends('layouts.acc_status')
@section('content_allow')
<br><br>
    <div class="container">
    @if(session('update-success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('update-success') }}</strong>
    </div>
    @endif
    <div class="panel-group">
    <div class="panel panel-info">
        @if(!isset($user)||$user->user_type=='Admin')
        <div class="panel-heading">
            <strong>Error</strong>
        </div>
        <div class="panel-body">
            <p>Sorry, We couldn't find the user. Plese click <a href="/">here</a> to back to home page.</p>
        </div>
        @else
        <div class="panel-heading">
            <div style="overflow:auto;position:relative;">
                <img style="width:100px;height:100px;border-radius:50%;float:left;" hspace="20" align="middle" src="/storage/profile_images/org_seller/{{$profiles->profile_image}}">
                <h3 style="float:left;">{{$user->username}}'s profile</h3>
                @if($user->username == Auth::user()->username)
                    {{--  Temporary renew form  --}}
                    {!! Form::open(['route' => ['membership-renew', Auth::user()->org_profile->membership_id], 'method' => 'PUT']) !!}
                    <div style="position: absolute;display:inline-block; bottom: 0;right: 0;">
                    <a class="btn btn-default" href="/changepassword" role="button">Change Password</a>
                    <a class="btn btn-info" href="/org_profiles/{{$user->username}}/edit" role="button">Edit Profile</a>
                    {{--  Temporary renew button  --}}
                    @if($diff<=31)
                    {{Form::submit('Renew Membership',['class' => 'btn btn-primary'])}}
                    @endif
                </div>
                {!! Form::close() !!}
                {{--  Temporary renew form closed  --}}
                @endif
            </div>
        </div>
        <div class="panel-body">
          @include('include.messages')
            <div class="row">
                <div class="container col-sm-6 col-md-6">
                    <h4>Account Details</h4>
                    <table class="table table-bordered">
                        <tr>
                        <th>Username</th>
                        <td>{{$user->username}}</td>
                        </tr>
                        <tr>
                        <th>Email</th>
                        <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                        <th>User Type</th>
                        <td>{{$user->user_type}}</td>
                        </tr>
                        <tr>
                        <th>Join At</th>
                        <td>{{$user->created_at->toDateString()}}</td>
                        </tr>
                        <tr>
                        <th>Last Login At</th>
                        <td>{{$user->last_login_at}}</td>
                        </tr>
                    </table>
                    <br>
                    <h4>Membership</h4>
                    <table class="table table-bordered">
                        <tr>
                        <th>End date</th>
                        <td>{{$membership->end_date}}</td>
                        </tr>
                        <tr>
                        <th>Remaining Days</th>
                        <td>{{$diff}}</td>
                        </tr>

                    </table>
                </div>

                <div class="container col-sm-6 col-md-6">
                    <h4>
                    @if($user->username == Auth::user()->username)
                    My
                    @endif
                    Profile
                    </h4>
                   
                    <table class="table table-bordered">
                        <tr>
                        <th>Org Name</th>
                        <td>{{$profiles->orgName}}</td>
                        </tr>
                        <tr>
                        <th>Org No</th>
                        <td>{{$profiles->orgNo}}</td>
                        </tr>
                        <tr>
                        <th>Contact Person</th>
                        <td>{{$profiles->contact_person}}</td>
                        </tr>
                        <tr>
                        <th>Contact Number</th>
                        <td>{{$profiles->contactNo}}</td>
                        </tr>
                        <tr>
                        <th>Address</th>
                        <td><textarea rows="3" cols="50" readonly="readonly" style="border: none;resize: none;">{{$profiles->address}}</textarea></td>
                        </tr>
                        <tr>
                       
                        <th>Postcode</th>
                        <td>{{$profiles->postCode}}</td>
                       
                        </tr>
                        <tr>
                        <th>State</th>
                        <td>{{$profiles->state}}</td>
                        </tr>
                   
                     
                        <tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
    </div>
 
<div class="panel panel-default">
  <div class="panel panel-heading"><h4><strong>Store Lists</strong><h4></div>
    <div class="panel panel-body">
      @if(count($stores) > 0)
      <table class="table">
      <tr>
          <td align="center"><strong>Image<strong></td>
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
              <td align="center"><img src="/image/stores/{{$store->image}}" style="max-height: 80px" class="img-responsive" ></td>
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
            {{link_to_route('OrgProfileController.addNewStore','Add new store',[$profiles->id],['class'=>'btn btn-primary'])}}
          </div>
    </div>
</div>

{{--EVENT TABLE--}}
<div class="panel panel-default">
 <div class="panel panel-heading"><h4><strong>Events</strong><h4></div>
   <div class="panel panel-body">
     @if(count($events) > 0)
         <table class="table">
         <tr>
             <td>Image</td>
             <td>Name</td>
             <td>Type</td>
             <td>Price</td>
             <td>Start Date</td>
             <td>End Date</td>
             <td>Start Time</td>
             <td>End Time</td>
             <td>Location</td>
             <td>Status</td>
             <td></td>
         </tr>

         @foreach($events as $event)
         @if($event->eventStatus == 'ACTIVE' || $event->eventStatus == 'DEACTIVE')
             <tr>
               <td><img src="/image/events/{{$event->eventImage}}" style="max-height:100px"></td>
                 <td>{{$event->eventName}}</td>
                 <td>{{$event->eventType}}</td>
                 <td>{{$event->eventPrice}}</td>
                 <td>{{$event->eventStartDate}}</td>
                 <td>{{$event->eventEndDate}}</td>
                 <td>{{$event->eventStartTime}}</td>
                 <td>{{$event->eventEndTime}}</td>
                 <td>{{$event->eventLocation}}</td>
                 <td>{{$event->eventStatus}}</td>
                 <td>{!! Form::open(array('route'=>['events.destroy',$event->id], 'method'=>'DELETE')) !!}
                   {{link_to_route('events.edit','Edit',[$event->id],['class'=>'btn btn-primary'])}}
                   {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                   {!! Form::close() !!}</td>

             </tr>
           @endif
         @endforeach
         </table>
         @else
         <h4>No record found!</h4>
         @endif
         {{link_to_route('OrgProfileController.addNewEvent','Add new Event',[$profiles->id],['class'=>'btn btn-primary'])}}
   </div>
</div>
@if(count($products) > 0)
<div class="panel panel-default">
<div class="panel panel-heading"><h4><strong>Pending Products</strong><h4></div>
  <div class="panel panel-body">
    <table class="table">
      <tr>
        <th>Name</th><th>Image 1</th><th>Image 2</th><th>Image 3</th><th>Store</th><th>Date Uploaded</th><th>Action</th>
      </tr>
      @foreach($stores as $store)
        @foreach($products as $product)
          @if($store->id == $product->storeID)
          <tr>
            <td>{{$product->productName}}</td>
            <td align="center"><img src="/image/products/{{$product->productImage1}}" style="max-height:100px"></td>
            <td align="center"><img src="/image/products/{{$product->productImage2}}" style="max-height:100px"></td>
            <td align="center"><img src="/image/products/{{$product->productImage3}}" style="max-height:100px"></td>
            <td>{{link_to_route('store.show',$store->storeName,[$store->id])}}</td>
            <td>{{$product->created_at}}</td>
            <td> {!! Form::model($product,array('route'=>['product.approveProduct',$product->id], 'method'=>'PUT')) !!}
              {{Form::button('Approve',['class'=> 'btn btn-success', 'type'=>'submit'])}}
              {{ Form::close() }}
            </td>
            <td>
              {!! Form::model($product,array('route'=>['product.rejectProduct',$product->id], 'method'=>'PUT')) !!}
                {{Form::button('Reject',['class'=> 'btn btn-danger', 'type'=>'submit'])}}
                {{ Form::close() }}
            </td>
          </tr>
          @endif
        @endforeach
      @endforeach
      </table>
  </div>
</div>
@endif

@if(count($services) > 0)
<div class="panel panel-default">
<div class="panel panel-heading"><h4><strong>Pending Services</strong><h4></div>
  <div class="panel panel-body">
    <table class="table">
      <tr>
        <th>Name</th><th>Image 1</th><th>Store Name</th><th>Pricing</th><th>Date Created</th><th>Action</th>
      </tr>
      @foreach($stores as $store)
        @foreach($services as $service)
          @if($store->id == $service->storeID)
          <tr>
            <td>{{$service->serviceName}}</td>
            <td align="center"><img src="/image/services/{{$service->serviceImage}}" style="max-height:100px"></td>
            <td>{{link_to_route('store.show',$store->storeName,[$store->id])}}</td>
            <td>{{$service->servicePrice}} per {{$service->serviceUnits}}</td>
            <td>{{$service->created_at}}</td>
            <td> {!! Form::model($service,array('route'=>['service.approveService',$service->id], 'method'=>'PUT')) !!}
              {{Form::button('Approve',['class'=> 'btn btn-success', 'type'=>'submit'])}}
              {{ Form::close() }}
            </td>
            <td>
              {!! Form::model($service,array('route'=>['service.rejectService',$service->id], 'method'=>'PUT')) !!}
                {{Form::button('Reject',['class'=> 'btn btn-danger', 'type'=>'submit'])}}
                {{ Form::close() }}
            </td>
          </tr>
          @endif
        @endforeach
      @endforeach
      </table>
  </div>
</div>
@endif

@endsection
