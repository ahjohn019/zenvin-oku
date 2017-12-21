@extends('master.marketmenutest')

@section('content')
<br><br>
    <div class="container">
    <div class="panel panel-default">
    <div class="panel-heading"><h3><strong>Stores</strong></h3></div>
    <div class="panel-body">
    @if(count($stores) > 0)
        <table class="table">
        <tr>
            <td></td>
            <td><strong>Name</strong></td>
            <td><strong>Description</strong></td>
            <td><strong>Address</strong></td>
            <td><strong>Representative Name</strong></td>
            <td><strong>Contact No.</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Action</strong></td>
        </tr>
        @include('include.messages')
        @foreach($stores as $store)
            <tr>
                <td align="center"><img src="/image/stores/{{$store->image}}" style="max-height: 100px" class="img-responsive" ></td>
                <td>{{$store->storeName}}</td>
                <td><p>{{$store->storeDesc}}</p></td>
                <td>{{$store->storeAddress}}</td>
                <td>{{link_to_route('store.show','View details',[$store->id],['class'=>'btn btn-info'])}}</td>
            </tr>
        @endforeach
        </table>
    @endif
  </div>
  </div>
  {{link_to_route('store.create','Add new store',null,['class'=>'btn btn-primary'])}}
  </div>
@endsection
