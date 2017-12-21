@extends('master.marketmenutest2')


@section('content')
<br><br>
@if (Auth::check())
@if( Auth::user()->user_type=='OrgSeller' )
<div class="container">
  {{--STORE DETAILS--}}
  <div class="panel panel-default">
    <div class="panel-heading"><h3><strong>{{$store->storeName}} </strong></h3></div>
    <div class="panel-body">
      @include('include.messages')
      <table class="table">
        <tr>
          <td rowspan="9"><img src="/image/stores/{{$store->image}}" style="max-height:200px"></td>
        </tr>
        <tr>
          <td><label>Description:</label></td><td colspan="3">{{$store->storeDesc}}</td>
        </tr>
        <tr>
          <td><label>Address:</label></td><td colspan="3">{{$private->address}}</td>
        </tr>
        <tr>
          <td><label>Postcode:</label></td><td colspan="3">{{$private->postCode}}</td>
        </tr>
        <tr>
          <td><label>State:</label></td><td colspan="3">{{$private->state}}</td>
        </tr>
        <tr>
          <td><label>Owner:</label></td><td>{{$private->name}}</td>
          <td><label>Organization:</label></td><td>{{link_to_route('front.orgdetails',$organization->orgName,$organization->id)}}</td>
        </tr>
        <tr>
          <td><label>Date Created:</label></td><td>{{$store->created_at->format('d-M-Y')}}</td>
          <td><label>Last Update:</label></td><td>{{$store->updated_at->format('d-M-Y')}}</td>
        </tr>
        <tr>
          <td colspan="4">
            @if($store->status == 'Active')
            {!! Form::open(array('route'=>['store.destroy',$store->id], 'method'=>'DELETE')) !!}
              {{link_to_route('store.edit',' Edit',[$store->id],['class'=>'btn btn-primary fa fa-pencil-square-o fa-lg'])}}
              {{Form::button(' Delete',['class'=>'btn btn-danger fa fa-times-circle fa-lg', 'type'=>'submit'])}}
            {!! Form::close() !!}
            @endif
          </td>
        </tr>
      </table>
    </div>
    
  </div>

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
                <td>Description</td>
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
                    <td>{{$product->productDesc}}</td>
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
                    <td>{{$product->productDesc}}</td>
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
            @if (Auth::check())
            @if($store->status == 'Active' && Auth::user()->user_type=='PrivateSeller' )
              {{link_to_route('store.addNewProduct','Add new Product',[$store->id],['class'=>'btn btn-primary'])}}
            @endif
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
                <td>Description</td>
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
                    <td>{{$service->serviceDesc}}</td>
                    <td>{{$service->serviceType}}</td>
                    <td>{{$service->servicePrice}}</td>
                    <td>{{$service->serviceUnits}}</td>
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
                    <td>{{$service->serviceDesc}}</td>
                    <td>{{$service->serviceType}}</td>
                    <td>{{$service->servicePrice}}</td>
                    <td>{{$service->serviceUnits}}</td>
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


@endif
@endif
  
</div>

@endsection
