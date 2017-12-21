@extends('master.marketmenutest')

@section('content')

<div class="container">
<header class="clearfix">
<div class="ex2"><img src="{{URL::to('image/blackfridaydeals.png')}}" alt="Image"></div>
</header>
    <div class="panel-heading">
      <table>
        <tr>
         <td style="padding:10px" width="750px"><h1><b>BLACK FRIDAY DEALS</b></h1></td>
          <td><form action="{{route('product.index')}}" method="get" class="form-inline">
          <div class="form-group" >
          <input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
          <div class="form-group">
          <button class="btn btn-success" type="submit">Search</button>
          </div>
          <a href="{{route('product.index')}}"><button class="btn btn-primary1" type="button" >Clear</button></a>
          </form>
          </div></td>
        </tr>
      </table>
      <table>
    <tr >
        <td style="padding:2px" width="50px">Sort: </td>
        <td style="padding:2px" width="100px">@sortablelink('productName','Name')</td>
        <td style="padding:2px" width="100px">@sortablelink('productPrice','Price')</td>
        <td style="padding:2px" width="130px">@sortablelink('productQuantity','Quantity')</td>
        <td style="padding:2px" width="100px">@sortablelink('created_at','Date')</td>
        <td style="padding:2px" width="100px">@sortablelink('updated_at','Latest')</td>
    </tr>

</table>
</div>

</div>

<div>

<div class="container">
    <div class="row">
            @if(count($products) == 0)
            <h2 class="prodheading">No Products Found!</h2>
            @else

              @foreach ($products as $key => $product)
                  @if($product->productStatus == 'ACTIVE')

                    <a href="{{route('product.show',$product->id)}}" style="color:black">

                    <div class="col-sm-2">
                        <div style="background-color: white">

                                  <table  class="table" >
                                    <tr >
                                      <td align="Center" colspan="2"><img src="/image/products/{{$product->productImage1}}"  style="max-height:133px; vertical-align: middle" class="img-responsive"></td>
                                    </tr>
                                    <tr >
                                      <td align="left" colspan="2">
                                        <div class="" style="white-space: nowrap;   width: 11em;   overflow: hidden;  text-overflow: ellipsis; ">
                                          <b>{{$product->productName}}</b>
                                        </div>

                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="color:red"><b>RM{{$product->productPrice}}</b></td>
                                      @foreach($stores as $store)
                                          @if($product->storeID == $store->id)
                                            <td style="color:grey" class="pull-right"><i>{{$store->storeName}}<i></td>
                                          @endif
                                      @endforeach
                                    </tr>
                                  </table>
                      </div>
                    </div>

                    </a>
                  @endif
              @endforeach
              @endif
        </div>
    </div>
</div>

<div class="container">
  <div class="pull-right">
    {!! $products->appends(\Request::except('page'))->render() !!}
  </div>
</div>



@endsection
