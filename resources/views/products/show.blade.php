@extends('master.marketmenutest')
<br>
@section('content')

<div class="container">

@include('include.messages')

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img" style="padding:15px">
                      <img src="boxingring.png" name="slide" style="max-height:300px">

                      <script type="text/javascript">
                      <!-->
                      var image1=new Image()
                      var image2=new Image()
                      var image3=new Image()
                      image1.src="/image/products/{{$product->productImage1}}"
                      //-->
                      </script>
                      @if ($product->productImage2=="product.png")
                      <script type="text/javascript">
                      <!-->
                      image2.src="/image/products/{{$product->productImage1}}"
                      //-->
                      </script>
                      @else
                      <script type="text/javascript">
                      <!-->
                      image2.src="/image/products/{{$product->productImage2}}"
                      //-->
                      </script>
                      @endif

                      @if ($product->productImage3=="product.png")
                      <script type="text/javascript">
                      <!-->
                      image3.src= image2.src
                      //-->
                      </script>

                      @else
                      <script type="text/javascript">
                      <!-->
                      image3.src="/image/products/{{$product->productImage3}}"
                      //-->
                      </script>
                      @endif
                      <script type="text/javascript">
                      <!--
                      var step=1
                      function slideit(){
                      document.images.slide.src=eval("image"+step+".src")
                      if(step<3)
                      step++
                      else
                      step=1
                      setTimeout("slideit()",3500)
                      }
                      slideit()
                      //-->
                      </script>
                      <table>
                        <tr>

                          <td style="padding:15px"><a href="/image/products/{{$product->productImage1}}">
                            <img src="/image/products/{{$product->productImage1}}" style="max-height:60px" class="img-responsive"></a></td>
                            @if($product->productImage2!="product.png")
                            <td style="padding:15px"><a href="/image/products/{{$product->productImage2}}">
                              <img src="/image/products/{{$product->productImage2}}" style="max-height:60px" class="img-responsive"></a></td>
                            @endif
                            @if($product->productImage3!="product.png")
                              <td style="padding:15px"><a href="/image/products/{{$product->productImage3}}">
                                <img src="/image/products/{{$product->productImage3}}" style="max-height:60px" class="img-responsive"></a></td>
                            @endif
                        </tr>
                      </table>

                    </div>


                    <div class="col-md-6 product_content">
                      {!! Form::model($product,array('route'=>['product.addToCart',$product->id], 'method'=>'PUT')) !!}
                      <h1 style="padding:10px">{{$product->productName}}</h1>
                      <table class="table">
                        <tr><td><strong>Price:</strong></td><td>RM {{$product->productPrice}}</td></tr>
                        <tr><td><strong>Units Left:</strong></td><td>{{$product->productQuantity}} unit(s) available.</td></tr>
                        <tr><td><strong>Store Name:</strong></td><td><a href=" {{route('front.storedetails',$store->id)}}" >{{$store->storeName}}</a></td></tr>
                        <tr><td><strong>Category:</strong></td><td>{{$product->productCategory}}</td></tr>
                        <tr><td><strong>Description:</strong></td><td>{{$product->productDesc}}</td></tr>
                        <tr><td><strong>Weight per unit:</strong></td><td>{{$product->productWeight}} KG</td></tr>
                        <tr><td>
                          <strong>Delivery Charges:</strong></td>
                          <td>
                          <table class="">
                          <tr><td>West Malaysia: </td><td>RM {{$product->deliveryWM}}</td></tr>
                          <tr><td>East Malaysia: </td><td>RM {{$product->deliveryEM}}</td></tr>
                          <tr>
                            <td colspan="2">{{Form::select('DeliveryMethod', ['Self-Pickup' => 'Self-Pickup','Delivery (West Malaysia)' => 'Delivery Courier (West Malaysia)','Delivery (East Malaysia)' => 'Delivery Courier(East Malaysia)'],null,['class' => 'form-control'])}}</td>
                          </tr>
                        </table>
                        </td></tr>
                        <tr>
                          <td><strong>Quantity:</strong></td>
                          <td>{{Form::text('Quantity', '1',['class' => 'form-control', 'placeholder' => 'Purchasing Quantity'])}}</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td>
                            @if (Auth::check())
                            @if (Auth::user()->user_type=='Customer')
                            {{Form::text('userid',Auth::user()->id,['class' => 'hidden'])}}
                            {{Form::button(' Add To Cart',['class'=> 'btn btn-danger  fa fa-cart-plus fa-lg', 'type'=>'submit'])}}
                            @else
                              Only customer can purchase
                            @endif
                            @else
                              {{link_to_route('user.signin',' Sign in to add to cart',null,['class'=>'btn btn-primary fa fa-sign-in'])}}
                            @endif
                          </td>
                          </tr>


                        <tr>

                      </tr>
                        <tr><td></td><td></td></tr>
                        </table>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                        </br>
                        </div>
                      {!! Form::close() !!}
                    </div>
                </div>
            </div>


</div>

@endsection
