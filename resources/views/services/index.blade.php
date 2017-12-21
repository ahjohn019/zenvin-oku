@extends('master.marketmenutest')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
<br><br>
<div class="container">

      <table>
        <tr>
          <td style="padding:10px" width="250px"><h1><b>Services</b></h1></td>
          <td><form action="{{route('services.index')}}" method="get" class="form-inline">
          <div class="form-group">
          <input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
          <div class="form-group">
          <button class="btn btn-success" type="submit">Search</button>
          </div>

          <a href="{{route('services.index')}}"><button class="btn btn-primary1" type="button" >Clear</button></a>
          </form>
          </div></td>
        </tr>
      </table>
      <head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>shop - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    background-color: #EAEAEA;
    font-family: 'Roboto', sans-serif;
}
.wrap {
    max-width: 940px;
    margin: 0 auto ;
}


/*Menu !!!!*/
.menu {
    vertical-align: top;
    display: inline-block;
    margin: 10px ;
    
}
.menu-item {
    background-color: #FEFEFE;
    width: 200px;
    height: 150px;
    margin: 10px;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
}

.header-item {
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #3C3D41  ;
    font-size: 11px;
    padding: 15px 15px;
    border-bottom: 1.5px solid #EAEAEA;
}

.color-row1,  .color-row2  {
    margin: 15px;
    padding:0;
    max-width: 220px;
}

.color-circle {
    max-width: 220px;
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 50px 50px 50px 50px;
    
}

.size-circle {
    background-color: #EBEBEB;

}

.sizedouble {
 
   margin: 5px 5px;

}
.size {
     margin: 6px 8px;
}

/*ITEMS!!!*/
img {
    width: 100px; 
    height: 130px;
    margin-top: 10px;
    vertical-align: top;
    position: relative;
    left: 50px;
}

.items  {
    width: 650px;
    margin: 5px;
    display: inline-block;
}
 .item {
    vertical-align: top;
    width: 190px; 
    height: 240px; 
    margin: 8px;
    background:#FEFEFE; 
    display: inline-block;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
 }

h3 {
    text-align: center;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-right: 5px;
    font-size: 1em;
}

h5 {
    position: relative;
    bottom: 10px;
    text-align: center;
    margin-top: 20px;
}

.descroption {
    margin: 0;
    text-align: center;
    font-size: 11px;
    
    color: grey;
    font-family: sans-serif;
}


/*BTN*/
.loadmore {
    height: 30px;
    width: 610px;
    margin-top: 25px;
    position: relative;
    left: 8px;
    text-decoration: none;
    font-size: 15px;
    background-color: #B8C6C7;
    color: #FEFEFE;
    border-radius: 4px;
    border: none;
    font-family: 'Roboto', sans-serif;
}

.mini-menu{
    width: 200px;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #848C8F ;
    font-size: 11px;
    margin: 10px;
}
.mini-menu ul {
    list-style: none;
    margin: 0;
    padding:0;
    text-align:left;
}
.mini-menu > ul > li {
    position: relative;
}
.mini-menu > ul > li > a {
    display: block;	
    outline: 0;	
    padding: 1.2em 1em;	
    text-decoration: none;	
    color:#3C3D41;	
    font-weight: normal;
    letter-spacing: 2px;	
    background: #FEFEFE;
    border-bottom: 1.5px solid #EAEAEA;
   
}

.mini-menu .sub > ul {
    height: 0;
    overflow: hidden;
    background: #848C8F;
}
.mini-menu .sub > ul > li > a {
    font-family:  sans-serif;
    color:#FEFEFE;
    font-size: 12px;
    display: block;
    text-decoration: none;
    padding: .7em 1em;
    text-transform: capitalize;
    font-style: normal; 
    letter-spacing: 1px;
}
/*.mini-menu .sub > ul > li > a:hover,*/
.mini-menu .sub > a.active,
 {
    padding-left: 1.3em;
    color: blue;
    content: "1";
    float: right;
    margin-right:6px;
    line-height: 12px;
}
.mini-menu .sub >  a:after{
    content: "»";
    float: right;
    margin-right:6px;
    line-height: 12px;
}

@media screen and (max-width: 940px) {
    .items {width: 420px;}
    .wrap {width: 700px;}
    .loadmore{width: 420px;}
   }
   @media screen and (max-width: 720px) {
    .items {width: 220px;}
    .wrap {width: 500px;}
    .loadmore{width: 220px;}
   }
   

   .ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 0.9em;
    height: 1.6em;
    cursor: default;
    outline: none;
    border: 1px solid rgb(207, 207, 207);
    background: #090;
    border-image: initial;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Document</title>
</head>
<body>


<div class="wrap">
    <div class="menu">
        <div class="mini-menu">
            <ul>
        <li class="sub">
            <a href="#">WOMAN</a>
            <ul>
               <li><a href="#">Jackets</a></li>
               <li><a href="#">Blazers</a></li>
               <li><a href="#">Suits</a></li>
               <li><a href="#">Trousers</a></li>
               <li><a href="#">Jenas</a></li>
               <li><a href="#">Shirts</a></li> 
            </ul>
        </li>
        <li class="sub">
            <a href="#">MAN</a>
            <ul>
               <li><a href="#">Jackets</a></li>
               <li><a href="#">Blazers</a></li>
               <li><a href="#">Suits</a></li>
               <li><a href="#">Trousers</a></li>
               <li><a href="#">Jenas</a></li>
               <li><a href="#">Shirts</a></li> 
            </ul>
        </li>
        <li class="sub">
            <a href="#">KIDS</a>
            <ul>
                <li><a href="#">Jackets</a></li>
               <li><a href="#">Blazers</a></li>
               <li><a href="#">Suits</a></li>
               <li><a href="#">Trousers</a></li>
               <li><a href="#">Jenas</a></li>
               <li><a href="#">Shirts</a></li> 
            </ul>
        </li>
        <li class="sub">
            <a href="#">Shoes&Bags</a>
            <ul>
            <li><a href="#">Jackets</a></li>
               <li><a href="#">Blazers</a></li>
               <li><a href="#">Suits</a></li>
               <li><a href="#">Trousers</a></li>
               <li><a href="#">Jenas</a></li>
               <li><a href="#">Shirts</a></li> 
            </ul>
        </li>
    </ul>
        </div>
        <div class="menu-size menu-item">
            <div class="header-item" >Size</div>
            <ul class="color-row1">
                <li class="color-circle size-circle" ><p class="sizedouble">XS</p></li>
                <li class="color-circle size-circle" style="background-color:#343534" ><p style="color:#999" class="size">S</p></li>
                <li class="color-circle size-circle" ><p class="size">M</p></li>
                <li class="color-circle size-circle" ><p class="size">L</p></li>
                <li class="color-circle size-circle" ><p class="sizedouble">XL</p></li>
            </ul>
        </div>
        <div class="menu-price menu-item">
            <div class="header-item" >Price</div>
            <p>
                <!--<label for="amount">Price range:</label>-->
                <input type="text" readonly id="amount"  style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
        </div>
        
    </div>

    <div class="items">
  
  <div class="items">
  @if(count($services) == 0)
            <h2 class="prodheading">No Services Found!</h2>
            @else

              @foreach ($services as $key => $service)
                  @if($service->serviceStatus == 'ACTIVE')
                  <a href="{{route('services.show',$service->id)}}" style="color:black">
        <div data-price="{{$service->servicePrice}}" class="item">
            <img src="/image/services/{{$service->serviceImage}}" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>{{$service->serviceName}}</h3>
                    <h5>RM{{$service->servicePrice}}</h5>
                    
                    @foreach($stores as $store)
                                          @if($service->storeID == $store->id)
                                          <h5 class="descroption">Store Name: {{$store->storeName}}</h5>
                                          @endif
                                      @endforeach
                </div>
        </div>

     @endif
              @endforeach


              @endif
    </div>


   
 <button class="loadmore">Load More</button>
    </div>
</div>
</body>

    <!--<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>-->





    <!--Menu-->
  <script type="text/javascript">
    $(document).ready(function () {
        $(".sub > a").click(function() {
            var ul = $(this).next(),
                    clone = ul.clone().css({"height":"auto"}).appendTo(".mini-menu"),
                    height = ul.css("height") === "0px" ? ul[0].scrollHeight + "px" : "0px";
            clone.remove();
            ul.animate({"height":height});
            return false;
        });
           $('.mini-menu > ul > li > a').click(function(){
           $('.sub a').removeClass('active');
           $(this).addClass('active');
        }),
           $('.sub ul li a').click(function(){
           $('.sub ul li a').removeClass('active');
           $(this).addClass('active');
        });
    });
</script>
<script src="script.js" ></script>
</html>
<script>
    $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1000,
      values: [ 190, 728 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
         var mi = ui.values[0];
              var mx = ui.values[1];
              filterSystem(mi, mx);
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );


  function filterSystem(minPrice, maxPrice) {
      $(".items div.item").hide().filter(function () {
          var price = parseInt($(this).data("price"), 10);
          return price >= minPrice && price <= maxPrice;
      }).show();
  }
  
//   $( "#slider-range" ).on( "slidechange", function( event, ui ) {
//     console.log(ui.value);
// } );
</script>
<script type="text/javascript">

</script>
</body>

                      </div>
                    </div>
                    </a>



    </div>
</div>

<div class="container">
  <div class="pull-right">
    {!! $services->appends(\Request::except('page'))->render() !!}
  </div>
</div>




@endsection
