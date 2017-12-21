@extends('master.marketmenutest')

@section('content')
<br>
<div class="container">
  <header class="clearfix">
  <img class ="img-circle" src="{{asset('images/'.$organizations->image)}}" height="200" weight="200" >
  </header>
<div class="row">
        
        <div class="col-md-8" >
                <h2 ><strong>{{$organizations->name}}</strong></h2>
                <p>{{$organizations->desc}}</p>
                <h4><strong>Location:</strong> {{$organizations->region}}</h4>
                <h4><strong>Verified:</strong> <span class="label label-danger">{{$organizations->verified}}</span></h4>
        </div><!-- end col-md 7 -->

        <div class="col-md-2 ">
            <div class="item-count">
            <h3 style="color:#8c8c8c;text-align:center">
                <strong> Total Store  <h1 style="color:red;text-align:center">{{$storeCount}}</h1></strong>
            </h3>    
        </div>
       </div><!--end col-md-2 -->
       
       <div class="col-md-2 "> 
           <div class="sub-itemcount">
            <h3 style="color:#8c8c8c;text-align:center">
                <strong> Active Store  <h1 style="color:red;text-align:center">{{$storeActive}}</h1></strong>
            </h3> 
            </div>   
       </div><!--end col-md-2 -->

</div><br><br><!-- end of row -->


 

<!-- new store layout-->

<div class="container">

<h3 class="firstheading"><strong>Our Store</strong></h3><hr>
    <div class="container" style="border: 1px solid #c2c2d6"><br>

    <div class="owl-carousel owl-theme">
    @foreach($stores as $store)
    <a href="{{route('front.storedetails',$store->id)}}">

    <div class="item">
        <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style="width:200px" >
          <img class ="myImg" src="/image/stores/{{$store->image}}" style="width:200px; height:200px">
          <div class="caption">
            <h4 style="text-align:center">{{$store->storeName}}</h4></a>
      </div>
    </div>
  </div>
    </div>
    
@endforeach


    </div>
    </div><br><!--end of container -->
    </div><br>

<!--new artist layout-->

<div class="container">
    <h3 class="firstheading"><strong>Our Artist</strong></h3><hr>
    <div class="container" style="border: 1px solid #c2c2d6;"><br>
    <div class="owl-carousel owl-theme">
    @foreach ($organizations->artist as $artist)
    <div class="item">
        <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style="width:200px" >
          <img class ="myImg" src="{{asset('images/'.$artist->image)}}" style="width:200px; height:200px">
          <div class="caption">
        <h4 style="text-align:center">{{$artist->Name}}</h4></a>
      </div>
      </div>
  </div>
</div>   
    @endforeach 
</div>
</div><br><!-- end of container -->
</div><br>



<!-- random picture -->
<div class="container">
            <h3>You may also like..</h3><br>
            @foreach($interested as $organizations)
            <div class="col-md-3">
            <div class="thumbnail">
            <div class="caption text-center">
            <a href="{{url('org/details',[$organizations->id])}}"><img class ="myImg" src="{{asset('images/'.$organizations->image)}}" height="150" weight="200" ></a>
            <a href="{{url('org/details',[$organizations->id])}}"><p>{{$organizations->name}}</p></a>
            </div>


            </div><!--end thumbnail-->
            </div><!--end col-md-3-->
            @endforeach
        </div>
        <div class="spacer"></div>
</div><!--End of Container-->

@endsection
