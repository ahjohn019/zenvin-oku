@if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
              <strong>{{$error}}</strong>
            </div>
        @endforeach
@endif

@if(session('storeAdded'))
    <div class="alert alert-success">
        <strong>{{session('storeAdded')}}</strong>
    </div>
@endif

@if(session('storeUpdated'))
    <div class="alert alert-success">
      <strong>{{session('storeUpdated')}}</strong>
    </div>
@endif

@if(session('storeDeleted'))
    <div class="alert alert-success">
      <strong>{{session('storeDeleted')}}</strong>
    </div>
@endif

@if(session('productAdded'))
    <div class="alert alert-success">
      <strong>{{session('productAdded')}}</strong>
    </div>
@endif

@if(session('productUpdated'))
    <div class="alert alert-success">
      <strong>{{session('productUpdated')}}</strong>
    </div>
@endif

@if(session('productDeleted'))
    <div class="alert alert-success">
      <strong>{{session('productDeleted')}}</strong>
    </div>
@endif

@if(session('serviceAdded'))
    <div class="alert alert-success">
      <strong>{{session('serviceAdded')}}</strong>
    </div>
@endif

@if(session('serviceUpdated'))
    <div class="alert alert-success">
      <strong>{{session('serviceUpdated')}}</strong>
    </div>
@endif

@if(session('serviceDeleted'))
    <div class="alert alert-success">
      <strong>{{session('serviceDeleted')}}</strong>
    </div>
@endif


@if(session('eventAdded'))
    <div class="alert alert-success">
      <strong>{{session('eventAdded')}}</strong>
    </div>
@endif

@if(session('eventUpdated'))
    <div class="alert alert-success">
      <strong>{{session('eventUpdated')}}</strong>
    </div>
@endif

@if(session('eventDeleted'))
    <div class="alert alert-success">
      <strong>{{session('eventDeleted')}}</strong>
    </div>
@endif

@if(session('searchProduct'))
    <div class="alert alert-success">
      <strong>{{session('searchProduct')}}</strong>
    </div>
@endif
@if(session('cartItemUpdated'))
    <div class="alert alert-success">
      <strong>{{session('cartItemUpdated')}}</strong>
    </div>
@endif
@if(session('cartItemDeleted'))
    <div class="alert alert-success">
      <strong>{{session('cartItemDeleted')}}</strong>
    </div>
@endif
@if(session('invalidQuantity'))
    <div class="alert alert-danger">
      <strong>{{session('invalidQuantity')}}</strong>
    </div>
@endif
@if(session('productExist'))
    <div class="alert alert-danger">
      <strong>{{session('productExist')}}</strong>
        {{link_to_route('product.show','No',[$product->id],['class'=>'btn btn-danger pull-right'])}}
        {{link_to_route('cartItem.show','Yes',Auth::user()->id,['class'=>'btn btn-warning pull-right'])}}
        <div>
          <br>
        </div>

    </div>
@endif

@if(session('serviceExist'))
    <div class="alert alert-danger">
      <strong>{{session('serviceExist')}}</strong>
        {{link_to_route('services.show','No',[$service->id],['class'=>'btn btn-danger pull-right'])}}
        {{link_to_route('cartItem.show','Yes',Auth::user()->id,['class'=>'btn btn-warning pull-right'])}}
        <div>
          <br>
        </div>

    </div>
@endif

@if(session('eventExist'))
    <div class="alert alert-danger">
      <strong>{{session('eventExist')}}</strong>
        {{link_to_route('events.show','No',[$event->id],['class'=>'btn btn-danger pull-right'])}}
        {{link_to_route('cartItem.show','Yes',Auth::user()->id,['class'=>'btn btn-warning pull-right'])}}
        <div>
          <br>
        </div>

    </div>
@endif

@if(session('overStore'))
    <div class="alert alert-danger">
      <strong>{{session('overStore')}}</strong>
    </div>
@endif
@if(session('overProduct'))
    <div class="alert alert-danger">
      <strong>{{session('overProduct')}}</strong>
    </div>
@endif

@if(session('productApprove'))
    <div class="alert alert-success">
      <strong>{{session('productApprove')}}</strong>
    </div>
@endif
@if(session('productReject'))
    <div class="alert alert-danger">
      <strong>{{session('productReject')}}</strong>
    </div>
@endif

@if(session('serviceApprove'))
    <div class="alert alert-success">
      <strong>{{session('serviceApprove')}}</strong>
    </div>
@endif
@if(session('serviceReject'))
    <div class="alert alert-danger">
      <strong>{{session('serviceReject')}}</strong>
    </div>
@endif
