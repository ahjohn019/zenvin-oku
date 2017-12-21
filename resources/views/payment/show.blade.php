@extends('master.marketmenutest')

@section('content')
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{URL::to('apple-touch-icon.png')}}">
        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!--This cause drop down function for category and user account does not work-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;

            }

            footer{
                position: fixed;
              left: 0;
              bottom: 0;
              width: 100%;
              background-color: grey;
              color: white;
              text-align: left;
              padding:2px;

            }
            h1{
              font-family: 'Times New Roman', Times, serif;
            }
            h2{
              font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            }

            button.accordion {
                background-color: #ccc;
                color: #444;
                cursor: pointer;
                padding: 12px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 15px;
                transition: 0.4s;
            }

            button.accordion.active, button.accordion:hover {
                background-color:darkgray;
            }

            div.panel-collapse collapse in{
                padding: 0 18px;
                background-color: white;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.2s ease-out;
            }

            h3{
                padding-left: 15px;
            }

            h4.personalDetails{
                 padding-left: 20px;
            }

            div.personalDetails{
                width:20%;
                padding-left:20px;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th {
               background-color:darkgrey;
            }

            th, td {
                padding: 5px;
                text-align: left;
            }

            table#tableConfirmation {
                width: 100%;
            }

            p.grandTotal{
                text-align:right;
                color:limegreen;
                padding-right:15px;
            }

            p.notice{
                padding-left: 15px;
                font-size: 13px;
            }
            div.button{
                padding-right:15px;
                text-align: right;
            }
            button.button{
                background-color:grey;
    border: none;
    color: floralwhite;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
            }

            p.total{
                text-align: right;
                font-size: 20px;
                color:green;
            }
            
            td.title{
                background-color:gainsboro;
            }

        </style>
        <link rel="stylesheet" href="{{URL::to('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/thumbnail.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/clearfix.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/imgmodal.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/sidemenu.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="{{URL::to('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    </head>
<!--Header section end-->
            
<!--Payment section-->
<body>
<br>
<h3>Checkout</h3>
<div class="panel-group" id="accordion">

    <!------Step 1------->
    {{ Form::open(array('route' => 'front.fakepaymentresponse', 'method' => 'get')) }}  

  <form id="form" class="panel panel-default" action="{{ route('front.fakepaymentresponse')}}" method="post">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <button class="accordion">Step 1: Billing Details</button>
         </a>
        </h4>
      <br>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="personalDetails">
        <h4>Personal Details</h4>
            <label for="name">Name</label><br>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required><br>
            <label for="email">Email Address</label><br>
            <input type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email" required><br>
            <label for="email">Phone</label><br>
            <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Phone" required><br>

        </div>
      </div>

    <!-------Step 2------->
      <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              <button class="accordion">Step 2: Payment Method</button>
         </a>
        </h4>
      <br>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          <p>Please select one payment method use in this order.</p>
            <input type="radio" name="payment" value="payment" checked> Ipay88 Payment Gateway<br>
        </div>
      </div>

    <!-------Step 3------->
         <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              <button class="accordion">Step 3: Confirmation</button>
         </a>
        </h4>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
         
<!-------Table-------->   
                     
    @if(count($cartItems) > 0)
    @php $total=0 @endphp

    <table id="tableConfirmation" style="width:100%">
    <tr>
        <td class="title"><strong>Item</strong></td>
        <td class="title"><strong>Name</strong></td>
        <td class="title"><strong>Unit Price</strong></td>
        <td class="title"><strong>Quantity</strong></td>
        <td class="title"><strong>Delivery Method</strong></td>
        <td class="title"><strong>Weight (kg)</strong></td>
        <td class="title"><strong>Delivery Charges</strong></td>
        <td class="title"><strong>Subtotal</strong></td>
    </tr>
    @include('include.messages')
    @foreach($cartItems as $cartItem)
        
    <!--Product -->
    @if($cartItem->itemType == 'Product')
    @foreach($products as $product)
    @if ($cartItem->itemID == $product->id )
    <tr>
        <!--Product Picture-->
        <td align="center"><img src="/image/products/{{$product->productImage1}}" style="max-height: 50px" class="img-responsive" ></td>
        <!--Product Name-->
        <td>{{$product->productName}}</td>
        {{ Form::hidden('productName[]', $product->productName) }}
        <!--Unit Price-->
        <td>RM {{number_format($product->productPrice, 2, '.', '')}}</td>
        {{ Form::hidden('productPrice[]', $product->productPrice) }}
        <!--Product Quantity-->
        <td>{{$cartItem->Quantity}}</td>
        {{ Form::hidden('quantity[]', $cartItem->Quantity) }}
        <!--Delivery Method-->
        <td>{{$cartItem->DeliveryMethod}}</td>
        {{ Form::hidden('deliveryMethod[]', $cartItem->DeliveryMethod) }}
        <!--Product Weight-->
        <td>{{$product->productWeight * $cartItem->Quantity}} kg</td>
         {{ Form::hidden('weight[]', $product->productWeight * $cartItem->Quantity) }}
        <td>
          @php
          $deliveryCharges =0;
          if ($cartItem->DeliveryMethod == "Delivery (West Malaysia)"){
            $deliveryCharges = number_format((float)ceil($product->productWeight * $cartItem->Quantity) * $product->deliveryWM, 2, '.', '');
          }
          else if($cartItem->DeliveryMethod == "Delivery (East Malaysia)"){
            $deliveryCharges = number_format((float)ceil($product->productWeight * $cartItem->Quantity) * $product->deliveryEM, 2, '.', '');
          }
          else{
            $deliveryCharges =  0;
          }
          @endphp
          <!--Delivery Charges-->
          RM {{number_format($deliveryCharges,2,'.','')}}
        {{ Form::hidden('deliveryCharges[]', $deliveryCharges) }}
        </td>
        <!--Subtotal-->        
        <td>RM {{number_format($product->productPrice * $cartItem->Quantity + $deliveryCharges,2,'.','')}}</td>
        {{ Form::hidden('subtotal[]', $product->productPrice * $cartItem->Quantity + $deliveryCharges) }}
        @php
        
        $total += $product->productPrice * $cartItem->Quantity + $deliveryCharges
        @endphp
    </tr>
    @endif
    @endforeach
    @endif
        
    <!--Service -->
    @if($cartItem->itemType == 'Service')
    @foreach($services as $service)
    @if ($cartItem->itemID == $service->id )
    <tr>
        <td align="center"><img src="/image/services/{{$service->serviceImage}}" style="max-height: 50px" class="img-responsive" ></td>
        <!--Serviec Name-->
        <td>{{$service->serviceName}}</td>
        {{ Form::hidden('serviceName[]', $service->serviceName) }}
        <td>RM {{number_format($service->servicePrice, 2, '.', '')}} per {{$service->serviceUnits}}</td>
        <!--Serviec Quantity-->
        <td>{{$cartItem->Quantity}}</td>
        {{ Form::hidden('quantity[]', $cartItem->Quantity) }}
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <!--Subtotal-->
        <td>RM {{number_format($service->servicePrice * $cartItem->Quantity,2,'.','')}}</td>
        @php
        
        $total += $product->productPrice * $cartItem->Quantity;
        @endphp
    </tr>
    @endif
    @endforeach
    @endif
    @endforeach
    @endif        
            
       <tr> <!--Grand Total-->  
           <td name="grandTotal" align="right" colspan="8" style="text-align:right"><p class="total">Total: RM {{number_format($total,2,'.','')}}</p>
           </td>
           {{ Form::hidden('total', $total) }}
        </tr>  
            </table>
<!------Table ended-------->   
  
        <!--$value = Form::getValueAttribute($fieldname, $value);-->   
        <!-- <p class="total">{{$total}}</p>
        <input type="hidden" name="total" value="</?php echo $total; ?>">-->
        <!--<img src="image/ipay88.jpg" alt="ipay88" width="95px"; height="104px"; style="padding-left:15px">
        <br>
        <p class="notice">Please note that your payment will be processed by Mobile88 Sdn Bhd.</p>-->
        <br>
        <div class="button">
        <button type="submit" class="button">Confirm Order</button>
        </div>
        <br>
    </div>
</div>
</form>
</div>
    {!! Form::close() !!}

<!--Payment section end-->

<!--Footer section-->
          @yield('content')
     <footer class="container-fluid ">
        <p>&copy; E-OKU All Right Reserved 2017</p>
     </footer>


    <!-- /container -->
        <script type ="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="https://use.fontawesome.com/0379815565.js"></script>
        <script src="{{URL::to('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('js/socialshare.js')}}"></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

        <!--date script-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
         $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
         });
        </script>

        <script>
			$(function() {
				Grid.init();
			});
		</script>
        <script src="{{URL::to('js/main.js')}}"></script>
        <script src="{{URL::to('js/modal.js')}}"></script>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
@endsection
