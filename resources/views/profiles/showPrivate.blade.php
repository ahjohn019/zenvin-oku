@extends('layouts.acc_status')
<br><br>
@section('content_allow')

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
                <img style="width:100px;height:100px;border-radius:50%;float:left;" hspace="20" align="middle" src="/storage/profile_images/private_seller/{{$profiles->profile_image}}">
                <h3 style="float:left;">{{$user->username}}'s profile</h3>
                @if($user->username == Auth::user()->username)
                <div style="position: absolute; bottom: 0;right:0;">
                    <a class="btn btn-default" href="/changepassword" role="button">Change Password</a>
                    <a class="btn btn-default" href="/private_profiles/{{$user->username}}/edit" role="button">Edit Profile</a>
                </div>
                @endif
            </div>
        </div>
        <div class="panel-body">
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
                    <h4>Organization</h4>
                    <table class="table table-bordered">
                        <tr>
                        <th>Organization Name</th>
                        <td>{{$organization->orgName}}</td>
                        </tr>
                        <tr>
                        <th>Membership end date</th>
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
                    @else
                        @if($profiles->gender == 'Male')
                        His
                        @else
                        Her
                        @endif
                    @endif
                    Profile
                    </h4>
                    <table class="table table-bordered">
                        <tr>
                        <th>Name</th>
                        <td>{{$profiles->name}}</td>
                        </tr>
                        <tr>
                        <th>Gender</th>
                        <td>{{$profiles->gender}}</td>
                        </tr>
                        <tr>
                        <th>NRIC</th>
                        <td>{{$profiles->nric}}</td>
                        </tr>
                        <tr>
                        <th>Disability</th>
                        <td>{{$profiles->disability}}</td>
                        </tr>
                        @if(isset($profiles->nOku))
                        <tr>
                        <th>NOKU</th>
                        <td>{{$profiles->nOku}}</td>
                        </tr>
                        @endif
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
    @if(count($store) > 0)
    @include('include.messages')
    <div class="panel panel-default">
    <div class="panel panel-heading">
      <h4><strong>My Store{{link_to_route('store.editSeller',' Edit',[$store->id],['class'=>'fa fa-pencil-square-o pull-right'])}}</strong><h4>
    </div>
      <div class="panel panel-body">
        <table class="table">
          <tr>
            <td rowspan="5" align="center"><img src="/image/stores/{{$store->image}}" style="max-height:200px"></td>
          </tr>
          <tr>
            <td><label>Store Name:</label></td><td colspan="3">{{$store->storeName}}</td>
          </tr>
          <tr>
            <td><label>Description:</label></td><td colspan="3">{{$store->storeDesc}}</td>
          </tr>
          <tr>
            <td><label>Date Created:</label></td><td>{{$store->created_at->format('d-M-Y')}}</td>
            <td><label>Last Update:</label></td><td>{{$store->updated_at->format('d-M-Y')}}</td>
          </tr>
        </table>
      </div>
  </div>
  @endif

  {{--PRODUCT TABLE--}}
 <div class="panel panel-default">
   <div class="panel panel-heading"><h4><strong>Store products</strong><h4></div>
     <div class="panel panel-body">

       <?php $a = 0;$b = 0;$c = 0; ?>
       @foreach($products as $product)
           @if ($product->productStatus == 'ACTIVE' )<?php $a++; ?>
           @elseif($product->productStatus == 'DEACTIVE' )<?php $b++; ?>
           @elseif($product->productStatus == 'PENDING' )<?php $c++; ?>
           @endif
       @endforeach
<?php $d=$a+$b+$c; ?>
       @if($d > 0)
           <table class="table">
           <tr>
               <td style="padding:5px"><h5>Active: {{$a}}</h5></td><td style="padding:5px"><h5>Deactive: {{$b}}</h5></td><td style="padding:5px"><h5>Pending: {{$c}}</h5> </td>
             </tr>
           <tr>
               <td>Name</td>
               <td>Price</td>
               <td>image1</td>
               <td>image2</td>
               <td>image3</td>
               <td>Quantity</td>
               <td>Category</td>
               <td>Status</td>

               <td></td>
           </tr>

           @foreach($products as $product)
           @if($product->productStatus == 'ACTIVE' || $product->productStatus == 'DEACTIVE')
               <tr>
                   <td>{{$product->productName}}</td>
                   <td>{{$product->productPrice}}</td>
                   <td><img src="/image/products/{{$product->productImage1}}" style="max-height:100px"></td>
                   <td><img src="/image/products/{{$product->productImage2}}" style="max-height:100px"></td>
                   <td><img src="/image/products/{{$product->productImage3}}" style="max-height:100px"></td>
                   <td>{{$product->productQuantity}}</td>
                   <td>{{$product->productCategory}}</td>
                   <td>{{$product->productStatus}}</td>
                   <td>{!! Form::open(array('route'=>['product.destroy',$product->id], 'method'=>'DELETE')) !!}
                     {{link_to_route('product.edit','Edit',[$product->id],['class'=>'btn btn-primary'])}}
                     {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                     {!! Form::close() !!}</td>
               </tr>
               @elseif ($product->productStatus == 'PENDING')
                   <td>{{$product->productName}}</td>
                   <td>{{$product->productPrice}}</td>
                   <td><img src="/image/products/{{$product->productImage1}}" style="max-height:100px"></td>
                   <td><img src="/image/products/{{$product->productImage2}}" style="max-height:100px"></td>
                   <td><img src="/image/products/{{$product->productImage3}}" style="max-height:100px"></td>
                   <td>{{$product->productQuantity}}</td>
                   <td>{{$product->productCategory}}</td>
                   <td>{{$product->productStatus}}</td>
                   <td>{!! Form::open(array('route'=>['product.destroy',$product->id], 'method'=>'DELETE')) !!}
                     {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                     {!! Form::close() !!}</td>
               </tr>
             @endif
           @endforeach
           </table>
           @else
           <h4>No record found!</h4>
           @endif
           @if($store->status == 'Active')
             {{link_to_route('store.addNewProduct','Add new Product',[$store->id],['class'=>'btn btn-primary'])}}
           @endif
     </div>
 </div>

 {{--SERVICE TABLE--}}
<div class="panel panel-default">
  <div class="panel panel-heading"><h4><strong>Store services</strong><h4></div>
    <div class="panel panel-body">
<?php $x = 0;$y = 0;$z = 0; ?>
      @foreach($services as $service)
          @if ($service->serviceStatus == 'ACTIVE' )<?php $x++; ?>
          @elseif($service->serviceStatus == 'DEACTIVE' )<?php $y++; ?>
          @elseif($service->serviceStatus == 'PENDING' )<?php $z++; ?>
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
              <td>Type</td>
              <td>Price</td>
              <td>Units</td>
              <td>image</td>
              <td>Status</td>
              <td></td>
          </tr>

          @foreach($services as $service)
          @if($service->serviceStatus == 'ACTIVE' || $service->serviceStatus == 'DEACTIVE')
              <tr>
                  <td>{{$service->serviceName}}</td>
                  <td>{{$service->serviceType}}</td>
                  <td>{{$service->servicePrice}}</td>
                  <td>per {{$service->serviceUnits}}</td>
                  <td><img src="/image/services/{{$service->serviceImage}}" style="max-height:100px"></td>
                  <td>{{$service->serviceStatus}}</td>
                  <td>{!! Form::open(array('route'=>['services.destroy',$service->id], 'method'=>'DELETE')) !!}
                    {{link_to_route('services.edit','Edit',[$service->id],['class'=>'btn btn-primary'])}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}</td>

              </tr>
              @elseif ($service->serviceStatus == 'PENDING')
              <tr>
                  <td>{{$service->serviceName}}</td>
                  <td>{{$service->serviceType}}</td>
                  <td>{{$service->servicePrice}}</td>
                  <td>per {{$service->serviceUnits}}</td>
                  <td><img src="/image/services/{{$service->serviceImage}}" style="max-height:100px"></td>
                  <td>{{$service->serviceStatus}}</td>
                  <td>{!! Form::open(array('route'=>['services.destroy',$service->id], 'method'=>'DELETE')) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}</td>

              </tr>
            @endif
          @endforeach
          </table>
          @else
          <h4>No record found!</h4>
          @endif
          @if($store->status == 'Active')
            {{link_to_route('store.addNewService','Add new Service',[$store->id],['class'=>'btn btn-primary'])}}
          @endif
    </div>
</div>
@endsection
