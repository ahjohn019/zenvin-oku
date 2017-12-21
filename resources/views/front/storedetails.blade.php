@extends('master.marketmenutest')

@section('content')
<div class="container" >

@foreach($stores as $store)
<header class="clearfix" >
<img class ="img-circle" src="/image/stores/{{$store->image}}" height="200" weight="300">
  </header>
  <div class="row">  
        <div class="col-md-6"  >
        <h2 ><strong>{{$store->storeName}} store</strong> </h2>
                <p>{{$store->storeDesc}}</p> 
                <h4><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Store since: </strong>{{$store->created_at->toDateString()}}</h4>
                <h4><span class="label label-success">{{$store->status}}</span></h4>
                
        </div><!-- end col-md 7 -->

        <div class="col-md-2">
        <div class="item-count">
          <h3 style="color:#8c8c8c;text-align:center">
            <strong> Total Product <h1 style="color:red;text-align:center">{{$productCount}}</h1></strong>
          </h3>
        </div>
        </div>

        <div class="col-md-2">
        <div class="sub-itemcount">
          <h3 style="color:#8c8c8c;text-align:center">
            <strong> Available Product <h1 style="color:red;text-align:center">{{$productActive}}</h1></strong>
          </h3>
        </div>
        </div>

        <div class="col-md-2">
        <div class="sub-itemcount">
          <h3 style="color:#8c8c8c;text-align:center">
            <strong> Available Service <h1 style="color:red;text-align:center">{{$serviceActive}}</h1></strong>
          </h3>
        </div>
        </div>


      
</div>
  </div><br><br><!-- end of container-->
  @endforeach

  

<!-- new product layout-->

<div class="container">

<h3 class="firstheading"><strong>Our Product</strong></h3><hr>
    <div class="container" style="border: 1px solid #c2c2d6"><br>

    <div class="owl-carousel owl-theme">
    @foreach($products as $product) 
    <a href="{{route('product.show',$product->id)}}">
    <div class="item">
        <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style="width:200px" >
          <img class ="myImg" src="/image/products/{{$product->productImage1}}" style="width:200px; height:200px">
          <div class="caption">
            <h4 style="text-align:center">{{$product->productName}}</h4></a>
      </div>
    </div>
  </div>
    </div>
   
@endforeach
    </div>
    </div><br><!--end of container -->
    </div><br>

<!-- new service layout-->

<div class="container">

<h3 class="firstheading"><strong>Our Service</strong></h3><hr>
    <div class="container" style="border: 1px solid #c2c2d6"><br>

    <div class="owl-carousel owl-theme">
    @foreach($services as $service) 
    <a href="{{route('services.show',$service->id)}}">
    <div class="item">
        <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style="width:200px" >
          <img class ="myImg" src="/image/services/{{$service->serviceImage}}" style="width:200px; height:200px">
          <div class="caption">
            <h4 style="text-align:center">{{$service->serviceName}}</h4></a>
      </div>
    </div>
  </div>
    </div>
   
@endforeach
    </div>
    </div><br><!--end of container -->
    </div><br>

@endsection