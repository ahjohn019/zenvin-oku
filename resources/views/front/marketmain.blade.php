@extends('master.marketmenutest')

@section('title')
OKU Shopping Cart
@endsection
<br>
@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">

        <img src="{{URL::to('image/mainbanner1.png')}}"alt="Image">

        <div class="hero">
        <br><br><br><br><br><br><br>
        <a href="{{route('product.index')}}" class="btn btn-hero btn-lg" role="button">Shop Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </div>
      </div>

      <div class="item">
        <img src="{{URL::to('image/banner3.png')}}" alt="Image">
        <div class="carousel-caption">
        <a href="{{url('services/2')}}" class="btn btn-hero btn-lg" role="button">More Details <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>


      <div class="item">
        <img src="{{URL::to('image/banner4.png')}}" alt="Image">
        <div class="carousel-caption">
        <a href ="{{URL::to('/blackfriday')}}" class="btn btn-hero btn-lg" role="button">More Details <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>

      <div class="item">
        <img src="{{URL::to('image/banner5.png')}}" alt="Image">
        <div class="carousel-caption">
        <a href ="{{URL::to('/handicraftfair')}}" class="btn btn-hero btn-lg" role="button">More Details <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>

    </div><!-- end for carousel inner -->


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="promo-area">
<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo1">
                <i class="fa fa-refresh" style="color:white;"></i>
                <p style="color:white;"><strong>30 Days return</strong></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo2">
                <i class="fa fa-money" style="color:white;"></i>
                <p style="color:white;"><strong>Cash-In Available</strong></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo3">
                <i class="fa fa-lock" style="color:white;"></i>
                <p style="color:white;"><strong>Secure payments</strong></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo4">
                <i class="fa fa-gift" style="color:white;"></i>
                <p style="color:white;"><strong>Multiple Choice</strong></p>
            </div>
        </div>
    </div>
</div>
</div> <!-- End promo area -->



<!-- Lightning Deals -->
<div class="container">
<h3 class="firstheading"><strong>Lightning Deals</strong><img src="{{URL::to('image/lightning_main.png')}}" style="max-height:40px"></h3>
<hr>
<div><img src="{{URL::to('image/lightsales_oku.png')}}" alt="Image" style="float:left;width:33%;height:376px; " ></div>
<div class="container" style="background-color:#e6e6e6;border: 1px solid #c2c2d6;width:67%;float:right;height:376px;"><br>

<div class="owl-carousel owl-theme">
@foreach($products as $prod)
@if($prod->productStatus == 'ACTIVE' && $prod->productPromo == 'LIGHTNINGDEALS')
<div class="item">
<a href="{{route('product.show',$prod->id)}}">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px" >
<img src="/image/products/{{$prod->productImage1}}"  style="max-height:133px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">{{$prod->productName}}</h4></a>
        <p style="text-align:center">RM{{$prod->productPrice}}</p>
        <p style="text-align:center"><span class="label label-primary">Lightning Deals</span></p>
      </div>
    </div><br>
</div>
</div>
@endif
@endforeach

<!--sample-->
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/4.jpg" alt="keychain" style="max-height:120px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">DIY Keychain</h4>
        <p style="text-align:center">RM8.00</p>
        <h4 style="text-align:center"><span class="label label-primary">Lightning Deals</span></h4>
      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/6.jpg" alt="doll" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Princess Doll</h4>
        <p style="text-align:center"> RM15.00</p>
        <h4 style="text-align:center"><span class="label label-primary">Lightning Deals</span></h4>
      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/5.jpg" alt="notepads" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Notepads</h4>
        <p style="text-align:center">RM10.00</p>
        <h4 style="text-align:center"><span class="label label-primary">Lightning Deals</span></h4>
      </div>
</div><br>
</div>
</div>

</div>
</div>
</div><br>
</div><!--end of container --><br>


<!-- Hot deals -->
<div class="container">
<h3 class="firstheading" style="color:red"><strong>Hot Deals</strong><img src="{{URL::to('image/fire_main.png')}}" style="max-height:40px"></h3>
<hr>
<div><img src="{{URL::to('image/hotdeal_banner.png')}}" alt="Image" style="float:left;width:33%;height:376px;" ></div>
<div class="container" style="background-color:#e6e6e6;border: 1px solid #c2c2d6;width:67%;float:right;height:376px;"><br>

<div class="owl-carousel owl-theme">
@foreach($products as $prod)
@if($prod->productStatus == 'ACTIVE' && $prod->productPromo == 'HOTDEALS')
<a href="{{route('product.show',$prod->id)}}">
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px" >
<img src="/image/products/{{$prod->productImage1}}"  style="max-height:133px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">{{$prod->productName}}</h4></a>
        <p style="text-align:center">RM{{$prod->productPrice}}</p>
        <h4 style="text-align:center"><span class="label label-danger">HOT !!</span></h4>
      </div>
    </div><br>
</div>
</div>
@endif
@endforeach
<!--sample-->
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/1.jpg" alt="woodchair" style="max-height:120px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Wood Chair</h4>
        <p style="text-align:center">RM25.00</p>
        <h4 style="text-align:center"><span class="label label-danger">HOT !!</span></h4>

      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/2.jpg" alt="handmadeteddybear" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Teddy Bear</h4>
        <p style="text-align:center">RM20.00</p>
        <h4 style="text-align:center"><span class="label label-danger">HOT !!</span></h4>

      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/3.jpg" alt="handmadeteddybear" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Teddy Bear(Blue & White)</h4>
        <p style="text-align:center">RM20.00</p>
        <h4 style="text-align:center"><span class="label label-danger">HOT !!</span></h4>

      </div>
</div><br>
</div>
</div>

</div>
</div><br>
</div><!--end of container --><br><br>


<!-- Recommend For You -->

<div class="container">
<h3 class="firstheading"><strong> Recommended For You </strong><img src="{{URL::to('image/thumbup_oku2.png')}}" style="max-height:40px"></h3>
<hr>
<div><img src="{{URL::to('image/recommend_banner.png')}}" alt="Image" style="float:left;width:33%;height:376px;" ></div>
<div class="container" style="background-color:#e6e6e6;border: 1px solid #c2c2d6;width:67%;float:right;height:376px;"><br>

<div class="owl-carousel owl-theme">
@foreach($products as $prod)
@if($prod->productStatus == 'ACTIVE' && $prod->productPromo == 'RECOMMENDED')
<a href="{{route('product.show',$prod->id)}}">
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px" >
<img src="/image/products/{{$prod->productImage1}}"  style="max-height:133px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">{{$prod->productName}}</h4></a>
        <p style="text-align:center">RM{{$prod->productPrice}}</p>
        <p style="text-align:center"><span class="label label-primary">Recommended</span></p>
      </div>
    </div><br>
</div>
</div>
@endif
@endforeach

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/7.jpg" alt="keychain" style="max-height:103px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">ShinChan Keychain(Yellow)</h4>
        <p style="text-align:center">RM8.00</p>
        <h4 style="text-align:center"><span class="label label-primary">Recommended</span></h4>

      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/8.jpg" alt="keychain" style="max-height:103px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">ShinChan Keychain(Red)</h4>
        <p style="text-align:center">RM8.00</p>
        <h4 style="text-align:center"><span class="label label-primary">Recommended</span></h4>

      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/9.jpg" alt="purse" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Rabbit Purse</h4>
        <p style="text-align:center">RM15.00</p>
        <h4 style="text-align:center"><span class="label label-primary">Recommended</span></h4>

      </div>
</div><br>
</div>
</div>

</div>
</div><br><!--end of container -->
</div><br><br>


<!-- Woodcraft -->

<div class="container">
<h3 class="firstheading"><strong>Super WOODCRAFT</strong></h3>
<hr>
<div><img src="{{URL::to('image/woodcraft_oku.png')}}" alt="Image" style="float:left;width:33%;height:376px;" ></div>
<div class="container" style="background-color:#e6e6e6;border: 1px solid #c2c2d6;width:67%;float:right;height:376px;"><br>

<div class="owl-carousel owl-theme">
@foreach($products as $prod)
@if($prod->productCategory == "WOODCRAFT" && $prod->productStatus == 'ACTIVE')
<a href="{{route('product.show',$prod->id)}}">
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px" >
<img src="/image/products/{{$prod->productImage1}}"  style="max-height:133px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">{{$prod->productName}}</h4></a>
        <p style="text-align:center">RM{{$prod->productPrice}}</p>
      </div>
    </div><br>
</div>
</div>
@endif
@endforeach

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/10.jpg" alt="woodowl" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Wood Owl</h4>
        <p style="text-align:center">RM30.00</p>

      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/11.jpg" alt="woodcoverjournal" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Wood Cover Journal</h4>
        <p style="text-align:center">RM15.00</p>

      </div>
</div><br>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/12.jpg" alt="ferriswheel" style="max-height:100px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">Handmade Wood Ferris Wheel</h4>
        <p style="text-align:center">RM30.00</p>

      </div>
</div><br>
</div>
</div>





</div>
</div><br><!--end of container -->
</div><br><br>

<!-- Our Partner -->

<div class="container">
<h3 class="firstheading"><strong>Our Partner</strong></h3><hr>
<div class="container" style="border: 1px solid #c2c2d6"><br>
<div class="owl-carousel owl-theme">
@foreach($organizations as $org)
<div class="item">
<div class="col-sm-6 col-md-4">
      <img class ="myImg" src="{{asset('images/'.$org->image)}}" style="width:150px; height:100px">
</div>
</div>
@endforeach
<div class="item"></div>

</div>
</div><br><!--end of container -->
</div><br>


<!-- Feature Events-->

<div class="container">
<h3 class="firstheading"><strong>Features Events</strong> <img src="{{URL::to('image/event.png')}}" style="max-height:40px"></h3>
<hr>
<div class="container" style="background-color:#e6e6e6;border: 1px solid #c2c2d6;width:100%;"><br>
<div class="owl-carousel owl-theme">
@foreach($events as $event)
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px" >
<div class="caption">
        <img class ="myImg" src="{{asset('image/events/'.$event->eventImage)}}" style="max-height:150px; vertical-align: middle" class="img-responsive">
        <h4 style="text-align:center">{{$event->eventName}}</h4>
        <h4 style="text-align:center">{{$event->eventPrice}}</h4>
</div>
</div><br>
</div>
</div>
@endforeach

<!--sample-->
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px;height:250px">
      <img src="/image/events/1.png" alt="musicparty" style="max-height:150px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>MusicParty Event</h4>
      </div>
</div>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px;height:250px">
      <img src="/image/events/2.jpg" alt="fundraise" style="max-height:150px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>Fund Raiser</h4>
      </div>
</div>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px;height:250px">
      <img src="/image/events/3.jpg" alt="walkforcharity" style="max-height:150px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>Walk For Charity</h4>
      </div>
</div>
</div>
</div>

</div>
</div><br><!--end of container -->
</div><br><br>

<!-- Feature Services-->

<div class="container">
<h3 class="firstheading"><strong>Feature Services</strong><img src="{{URL::to('image/service_oku2.png')}}" style="max-height:40px"></h3>
<hr>
<div class="container" style="background-color:#e6e6e6;border: 1px solid #c2c2d6;width:100%;"><br>
<div class="owl-carousel owl-theme">
@foreach($services as $service)
<a href="{{route('services.show',$service->id)}}">
<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px" >
<img src="/image/services/{{$service->serviceImage}}"  style="max-height:133px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4 style="text-align:center">{{$service->serviceName}}</h4></a>
        <p style="text-align:center">RM{{$service->servicePrice}}</p>
      </div>
    </div><br>
</div>
</div>
@endforeach

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/services/1.jpg" alt="computerrepair" style="max-height:120px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>Computer Repair Service</h4>
        <p>RM25.00</p>

      </div>
</div>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/services/2.jpg" alt="shoerepair" style="max-height:120px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>Shoe Repair Service</h4>
        <p>RM25.00</p>

      </div>
</div>
</div>
</div>

<div class="item">
<div class="col-sm-6 col-md-4">
<div class="thumbnail" style="width:200px">
      <img src="/image/services/3.png" alt="watchrepair" style="max-height:120px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>Watch Repair Service</h4>
        <p>RM15.00</p>

      </div>
</div>
</div>
</div>


</div>
</div><br><!--end of container -->
</div><br><br>

<!--Store Product 1-->
<div class="container">
<h3 class="firstheading"><strong>99 Store</strong></h3><hr>
<div class="flex-container">
  <div ><img src="{{URL::to('image/smallbanner.png')}}"  style="height:325px; width:325px;" class="img-responsive"></div>
  <!--limit the item display on main page -->
  @foreach($products as $key =>$prod)
   @if($key <= 3 )
  <div class="item">
  <div class="thumbnail"  >
  <img src="/image/products/{{$prod->productImage1}}"  style="max-height:140px; vertical-align: middle" class="img-responsive">
        <div class="caption">
          <h4 style="text-align:center">{{$prod->productName}}</h4>
          <p style="color:red;text-align:center">RM {{$prod->productPrice}}</p>
          <div class="clearfix"><p>
          <a href="{{route('product.show',$prod->id)}}" class="btn btn-primary pull-right" role="button">Details</a>
          </p>
          </div>
        </div>
      </div>
      </div>
    @endif
  @endforeach

<div class="item">
<div class="thumbnail" style="width:200px">
      <img src="/image/products/13.jpg" alt="keychain" style="max-height:133px; vertical-align: middle" class="img-responsive">
      <div class="caption">
        <h4>Baymax Keychain</h4>
        <p style="color:red">RM15.00</p>
         <div class="clearfix"><p><a href="#" class="btn btn-success pull-right" role="button">Details</a></p></div>
      </div>
</div>
</div>



</div>
</div><!-- end of container--> <br><br>






@endsection
