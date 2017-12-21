@extends('master.marketmenutest')
<style media="screen">
.td {
  width:250px;

}
</style>
@section('content')
<br><br>
<table class="table">
  <tr>
    <td align="center"><a href="/image/events/{{$event->eventImage}}"><img src="/image/events/{{$event->eventImage}}" name="slide" style="width:900px"></a></td>
  </tr>
</table>

<br><br>
<div class="container">

@include('include.messages')
<br>
            <div class="modal-body">
                <div class="row">
                    <div>
                      {!! Form::model($event,array('route'=>['events.addToCart',$event->id], 'method'=>'PUT')) !!}
                        <h1 style="padding:10px">{{$event->eventName}}</h1>
                      <table class="table">
                        <tr><td width="250px"><strong>Organisation Name:</strong></td><td><a href="#" >{{$orgs->orgName}}</a></td></tr>
                        <tr><td><strong>Category:</strong></td><td>{{$event->eventType}}</td></tr>
                        <tr><td><strong>Date:</strong></td><td><b>{{$event->eventStartDate}}</b> to <b>{{$event->eventEndDate}}</b></td></tr>
                        <tr><td><strong>Time:</strong></td><td><b>{{$event->eventStartTime}}</b> to <b>{{$event->eventEndTime}}</b></td></tr>
                        <tr><td><strong>Location:</strong></td><td>{{$event->eventLocation}}</td></tr>
                        <tr><td><strong>Description:</strong></td><td>{{$event->eventDesc}}</td></tr>
                        <tr><td><strong>Price/Entry Fees:</strong></td><td><strong> RM {{$event->eventPrice}}</strong></td></tr>
                        @if($event->eventCouponPrice > 0)
                        <tr><td><strong>Coupon Price:</strong> </td><td><strong> RM {{$event->eventCouponPrice}}</strong></td></tr>
                        <tr><td><strong>Coupon Description:</strong> </td><td>{{$event->eventCouponDesc}}</td></tr>
                        @endif

                      <tr>
                          <td><strong>Purchases:</strong> </td>
                          <td>
                            <table class="table">
                              <tr>
                                <td width="150px"><strong>Ticket Quantity:</strong></td>
                                <td width="250px">{{Form::text('TicketQuantity', '1',['class' => 'form-control', 'placeholder' => 'Ticket Quantity'])}}</td>
                              </tr>
                              @if($event->eventCouponPrice > 0)
                              <tr>
                                <td><strong>Coupon Quantity:</strong></td>
                                <td>{{Form::text('CouponQuantity', '1',['class' => 'form-control', 'placeholder' => 'Coupon Quantity'])}}</td>
                              </tr>
                              @endif
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
                          </table>
                        </td>
                      </tr>


                        </table>

                        <div class="space-ten"></div>

                    </div>
                </div>
            </div>


</div>

@endsection
