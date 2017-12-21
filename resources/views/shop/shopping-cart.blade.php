@extends('master.marketmenutest')

@section('content')
<br><br><br><br>
<div class="container">
<div class="page-header" id="features">
<h2>Your Cart</h2>
</div>
@if(Session::has('cart'))
   <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group">
            @foreach($handicrafts as $handicraft)
                    <li class="list-group-item">
                        <span class="badge">{{ $handicraft['qty']}}</span>
                        <strong>{{$handicraft['item']['title']}} : </strong>
                        <span class="label label-success">{{$handicraft['price']}}</span>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('front.reduceByOne',['id'=>$handicraft['item']['id']])}}">Reduce one</a></li>
                                <li><a href="{{route('front.remove',['id'=>$handicraft['item']['id']])}}">Reduce All</a></li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
   </div>
   <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total:{{$totalPrice}}</strong>
        </div>
   </div>
   <hr>
   <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <button type="button" class="btn-btn success">Checkout</button>
        </div>
   </div>
@else
<div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items In Cart!</h2>
        </div>
</div>
                <button><a href="{{ url('/payment')}}">Checkout</a></button>

</div>
@endif
@endsection
