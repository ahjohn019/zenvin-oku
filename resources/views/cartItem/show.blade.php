@extends('master.marketmenutest')

@section('content')
<br><br><br><br>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"><h3><strong>Shopping Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></strong></h3></div>
<div class="panel-body">
    
    @if(count($cartItems) > 0)
    @php $total=0 @endphp

    <table name="cart" class="table">
    <tr>
        <td><strong>Item</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Unit Price</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Delivery Method</strong></td>
        <td><strong>Weight (kg)</strong></td>
        <td><strong>Delivery Charges</strong></td>
        <td><strong>Subtotal</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    @include('include.messages')
    @foreach($cartItems as $cartItem)
        
    <!--Product -->
    @if($cartItem->itemType == 'Product')
    @foreach($products as $product)
    @if ($cartItem->itemID == $product->id )
    <tr>
        <td align="center"><img src="/image/products/{{$product->productImage1}}" style="max-height: 50px" class="img-responsive" ></td>
        <td>{{$product->productName}}</td>
        <td>RM {{number_format($product->productPrice, 2, '.', '')}}</td>
        <td>{{$cartItem->Quantity}}</td>
        <td>{{$cartItem->DeliveryMethod}}</td>
        
        <td>{{$product->productWeight * $cartItem->Quantity}} kg</td>
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
          RM {{$deliveryCharges}}
        </td>
        
        <td>RM {{$product->productPrice * $cartItem->Quantity}}</td>
        
        <td>RM {{number_format($product->productPrice * $cartItem->Quantity + $deliveryCharges,2,'.','')}}</td>
        @php
        $total += $product->productPrice * $cartItem->Quantity + $deliveryCharges
        @endphp
        <td>
          {!! Form::open(array('route'=>['cartItem.destroy',$cartItem->id], 'method'=>'DELETE')) !!}
            {{link_to_route('cartItem.edit','',[$cartItem->id],['class'=>'btn btn-primary fa fa-pencil-square-o fa-lg'])}}
            {{Form::button('',['class'=>'btn btn-danger fa fa-times-circle fa-lg', 'type'=>'submit'])}}
            {!! Form::close() !!}
        </td>
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
        <td>{{$service->serviceName}}</td>
        <td>RM {{number_format($service->servicePrice, 2, '.', '')}} per {{$service->serviceUnits}}</td>
        <td>{{$cartItem->Quantity}}</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>RM {{number_format($service->servicePrice * $cartItem->Quantity,2,'.','')}}</td>
        @php
        $total += $product->productPrice * $cartItem->Quantity;
        @endphp
        <td>
          {!! Form::open(array('route'=>['cartItem.destroy',$cartItem->id], 'method'=>'DELETE')) !!}
            {{link_to_route('cartItem.edit','',[$cartItem->id],['class'=>'btn btn-primary fa fa-pencil-square-o fa-lg'])}}
            {{Form::button('',['class'=>'btn btn-danger fa fa-times-circle fa-lg', 'type'=>'submit'])}}
            {!! Form::close() !!}
        </td>
    </tr>
    @endif
    @endforeach
    @endif
    @endforeach
    {{ Form::open(array('action' => 'PaymentController@getPayment', 'method' => 'get')) }}
    <tr>
      <td name="grandTotal" align="right" colspan="5">Total :</td>
      <td>RM {{$total}}</td>
      <td>@if (Auth::guard('web')->check())
          <!--cannot use button here or else error "no cartItems in payment.show.php"-->
         <a type="submit" class="btn btn-success fa fa-check-square-o fa-lg" href="{{route('payment.show',Auth::user()->id)}}", >Checkout</a>
        <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty:''}}</span>
          @endif
     </td>
     <!-- <td name="grandTotal" align="right" colspan="7">Total :</td>
      <td>RM {{number_format($total,2,'.','')}}</td>
      <td>{{link_to_route('cartItem.checkOut','Checkout',$cartItem->userid,['class'=>'btn btn-success fa fa-check-square-o fa-lg'])}}</td>-->
    </tr>
    </table>
</div>
@endif
</div>
</div><br><br><br><br>
@endsection
