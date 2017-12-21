@extends('master.marketmenutest')

@section('content')
<br>
<div class="container">
<br>
@include('include.messages')
<br>

<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title> E Commerce products - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    
/*****************globals*************/
body {
font-family: 'open sans';
overflow-x: hidden; }

img {
max-width: 100%; }

.preview {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-webkit-flex-direction: column;
  -ms-flex-direction: column;
      flex-direction: column; }		
@media screen and (max-width: 996px) {
.preview {
  margin-bottom: 20px; } }

.preview-pic {
-webkit-box-flex: 1;
-webkit-flex-grow: 1;
  -ms-flex-positive: 1;
      flex-grow: 1; }

.preview-thumbnail.nav-tabs {
border: none;
margin-top: 15px; }
.preview-thumbnail.nav-tabs li {
width: 18%;
margin-right: 2.5%; }
.preview-thumbnail.nav-tabs li img {
  max-width: 100%;
  display: block; }
.preview-thumbnail.nav-tabs li a {
  padding: 0;
  margin: 0; }
.preview-thumbnail.nav-tabs li:last-of-type {
  margin-right: 0; }

.tab-content {
overflow: hidden; }
.tab-content img {
width: 100%;
-webkit-animation-name: opacity;
        animation-name: opacity;
-webkit-animation-duration: .3s;
        animation-duration: .3s; }

.qform{
  width: 25px;
}

.card {
margin-top: 50px;
background: #eee;
padding: 3em;
line-height: 1.5em; }

@media screen and (min-width: 997px) {
.wrapper {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex; } }

.details {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-webkit-flex-direction: column;
  -ms-flex-direction: column;
      flex-direction: column; }

.colors {
-webkit-box-flex: 1;
-webkit-flex-grow: 1;
  -ms-flex-positive: 1;
      flex-grow: 1; }

.product-title, .price, .sizes, .colors {
text-transform: UPPERCASE;
font-weight: bold; }

.checked, .price span {
color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
margin-bottom: 15px; }

.product-title {
margin-top: 0; }

.size {
margin-right: 10px; }
.size:first-of-type {
margin-left: 40px; }

.color {
display: inline-block;
vertical-align: middle;
margin-right: 10px;
height: 2em;
width: 2em;
border-radius: 2px; }
.color:first-of-type {
margin-left: 20px; }

.add-to-cart, .like {
background: #ff9f1a;
padding: 1.2em 1.5em;
border: none;
text-transform: UPPERCASE;
font-weight: bold;
color: #fff;
-webkit-transition: background .3s ease;
      transition: background .3s ease; }
.add-to-cart:hover, .like:hover {
background: #b36800;
color: #fff; }

.not-available {
text-align: center;
line-height: 2em; }
.not-available:before {
font-family: fontawesome;
content: "\f00d";
color: #fff; }

.orange {
background: #ff9f1a; }

.green {
background: #85ad00; }

.blue {
background: #0076ad; }

.tooltip-inner {
padding: 1.3em; }

@-webkit-keyframes opacity {
0% {
opacity: 0;
-webkit-transform: scale(3);
        transform: scale(3); }
100% {
opacity: 1;
-webkit-transform: scale(1);
        transform: scale(1); } }

@keyframes opacity {
0% {
opacity: 0;
-webkit-transform: scale(3);
        transform: scale(3); }
100% {
opacity: 1;
-webkit-transform: scale(1);
        transform: scale(1); } }

/*# sourceMappingURL=style.css.map */
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>

<body>
<h1>Service Details</h1>
<div class="container">
 
<div class="card">
  <div class="container-fliud">
    <div class="wrapper row">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- e commers -->
<ins class="adsbygoogle"
 style="display:block"
 data-ad-client="ca-pub-9155049400353686"
 data-ad-slot="5554792257"
 data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
      <div class="preview col-md-6">
        
        <div class="preview-pic tab-content">
          <div class="tab-pane active" id="pic-1"><img src="/image/services/{{$service->serviceImage}}" /></div>
          <div class="tab-pane" id="pic-2"><img src="/image/services/{{$service->serviceImage}}" /></div>
						<div class="tab-pane" id="pic-3"><img src="/image/services/{{$service->serviceImage}}" /></div>
						  <div class="tab-pane" id="pic-4"><img src="/image/services/{{$service->serviceImage}}" /></div>
      
        </div>
        <ul class="preview-thumbnail nav nav-tabs">
          <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="/image/services/{{$service->serviceImage}}" /></a></li>
          <li><a data-target="#pic-2" data-toggle="tab"><img src="/image/services/{{$service->serviceImage}}" /></a></li>
          <li><a data-target="#pic-3" data-toggle="tab"><img src="/image/services/{{$service->serviceImage}}" /></a></li>
          <li><a data-target="#pic-4" data-toggle="tab"><img src="/image/services/{{$service->serviceImage}}" /></a></li>
         
        
        </ul>
        
      </div>
      <div class="details col-md-6">
      {!! Form::model($service,array('route'=>['services.addToCart',$service->id], 'method'=>'PUT')) !!}
        <h3 class="product-title">{{$service->serviceName}} </h3>
      
        <p class="product-description">{{$service->serviceDesc}}</p>
        <h4 class="price">current price: <span>RM{{$service->servicePrice}}</span></h4>
        <p> {{$store->storeName}}</p>
        <p><p>Quantity :</p>{{Form::text('Quantity', '1',['class' => 'form-control', 'placeholder' => 'Purchasing Quantity','class' => 'qform'])}}</p>
        
      
        <div class="action">
        @if (Auth::check())
                              @if (Auth::user()->user_type=='Customer')
                              {{Form::text('userid',Auth::user()->id,['class' => 'hidden'])}}
                              {{Form::button(' Add To Cart',['class'=> 'add-to-cart btn btn-default', 'type'=>'submit'])}}
                              @else
                                Only customer can purchase
                              @endif
                              @else
                                {{link_to_route('user.signin',' Sign in to add to cart',null,['class'=>'btn btn-primary fa fa-sign-in'])}}
                              @endif
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
 style="display:block; text-align:center;"
 data-ad-format="fluid"
 data-ad-layout="in-article"
 data-ad-client="ca-pub-9155049400353686"
 data-ad-slot="7825539155"></ins>
<script>
 (adsbygoogle = window.adsbygoogle || []).push({});
</script>


</div>

@endsection
