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

            h4{
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

               background-color:gainsboro;
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

            div.total{
                padding-left: 15px;
                text-align: right;
                font-size: 20px;
                color:green;
            }

            div.title{
                text-align: center;
                font-size: 30px;
            }

            div.title1{
                padding-left: 70px;
                font-size: 17px;
            }

            div.merchantDetails{
                padding-left: 15px;
                font-size: 10px;
            }

            table.table{
                margin-left:auto;
                margin-right:auto;
            }

            p.total{
                text-align: right;
                font-size: 20px;
                color:green;
            }

            p.print{ color:cornflowerblue;
                border-radius: 12px;
                padding: 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                display:inline;
                text-decoration: underline;
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
<h3>Receipt</h3>
        <h4>Your transaction was successful. <p class="print" onclick="myFunction()" style="font-size:22px">&#128424; Print receipt</p></h4>

<?php
$name = (isset($_GET['name']))? $_GET['name']: "null";
$email = (isset($_GET['email']))? $_GET['email']: "null";
$phone = (isset($_GET['phone']))? $_GET['phone']: "null";
        
$productName = (isset($_GET['productName']))? $_GET['productName']: "null";
$productPrice = (isset($_GET['productPrice']))? $_GET['productPrice']: "0.00";
$quantity = (isset($_GET['quantity']))? $_GET['quantity']: "0";
$deliveryMethod = (isset($_GET['deliveryMethod']))? $_GET['deliveryMethod']: "null";
$weight = (isset($_GET['weight']))? $_GET['weight']: "0.00";
$deliveryCharges = (isset($_GET['deliveryCharges']))? $_GET['deliveryCharges']: "0.00";
    
$subtotal = (isset($_GET['subtotal']))? $_GET['subtotal']: "0.00";   

$serviceName = (isset($_GET['serviceName']))? $_GET['serviceName']: "null";
        
$total = (isset($_GET['total']))? $_GET['total']: "0.00";
$total2 = floatval($total);
$total3 = number_format($total2, 2);

if(isset($merchant))
{
    foreach ($merchant as $key1){

    }
}
        

if(isset($payment))
{
    foreach ($payment as $key2){

    }
}

if(isset($stores)){

    foreach ($stores as $key3){

    }
}
        
if(isset($organization)){

    foreach ($organization as $key4){

    }
}

?>
        
<div class="title">
<p>OKU Marketplace</p>
</div>
<table id="tableReceipt" style="width:90%;" class="table">
        <col style="width:45%">
        <col style="width:45%">
<tr>
                 <th style="text-align:center;">Customer</th>
                 <th style="text-align:center;">Bill To</th>
             </tr>
            <tr style="text-align:left; font-size:15px;">
                <td><?php echo $name."<br>";
                    echo $email."<br>";
                    echo $phone."<br>"."<br>";
                    echo "<b>Payment Date: </b>";
                    echo $key2->paymentDate."<br>";
                    echo "<b>Payment Method: </b>";
                    echo "Ipay88 Payment Gateway";?></td>
                <td><?php echo "<b>Merchant ID: </b>";
                    echo $key1->merchantID."<br>";
                    echo "<b>Store Name: </b>";
                    echo $key3->storeName."<br>.<br>";  
                    echo "<b>$key4->name</b>"."<br>";
                    echo $key4->addr."<br>";   
                    echo $key4->region."<br>";
                    echo $key4->phone_no."<br>"; ?></td>
            </tr>
</table>

<div class="title1">
    <p><b>Reference No: </b><?php  echo $purchase; ?></p>
</div> 
        
<!-------Table-------->   
        <table id="tableReceipt" style="width:90%;" class="table">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:15%">
             <tr>
                 <th>Product Name</th>
                 <th>Unit Price</th> 
                 <th>Quantity</th>
                 <th>Delivery Method</th>
                 <th>Weight (kg)</th>
                 <th>Delivery Charges</th>
                 <th>Subtotal</th>
             </tr>
            <tr> 
                
                <td>
                    <?php foreach($productName as $key4) 
                    {echo $key4."<br>";}?>
                </td>
                
                <td>
                    <?php foreach($productPrice as $key5) 
                    {echo "RM ".$key5."<br>";}?>
                </td>
                
                <td>
                    <?php foreach($quantity as $key6) 
                    {echo $key6."<br>";}?>
                </td>
                
                 <td>
                    <?php foreach($deliveryMethod as $key7) 
                    {echo $key7."<br>";}?>
                </td>  
                <td>
                    <?php foreach($weight as $key8) 
                    {echo $key8."<br>";}?>
                </td>
                <td>
                    <?php foreach($deliveryCharges as $key9) 
                    {echo "RM ".$key9."<br>";}?>
                </td>
                <td align="right" colspan="5" style="text-align:right">
                    <?php foreach($subtotal as $key10) 
                    {echo "RM ".$key10.".00"."<br>";}?>                    
                </td>               
            </tr>
            <tr><td colspan="7"><p class="total">Total: RM <?php echo($total3); ?></p></td></tr>
            </table>    

<!--printing function -->
<script>
function myFunction() {
    window.print();
    document.location.href = "{{url('/')}}";
}
</script>
<!------Table ended-------->

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
