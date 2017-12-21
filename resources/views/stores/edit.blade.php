@extends('master.marketmenutest')

@section('content')
<br><br>
    <div class="container">
      <div class="panel panel-default">
      <div class="panel-heading"><h3><strong>Edit Store</strong></h3></div>
      @include('include.messages')
      {!! Form::model($store,array('route'=>['store.update',$store->id], 'method'=>'PUT', 'files'=>true)) !!}
          <div class="form-group">
          {{Form::label('storeOwner', 'Store Owner')}}
          <div class="details1" style="display:none">
            <select class="form-control" name="private_id">
              <option value="" disabled selected>-Select store owner-</option>
              @foreach($privates as $private)
              <option value="{{$private->id}}">{{$private->name}} - {{$private->nric}}</option>
              @endforeach
            </select>
            </div>
          <a id="more1" href="#" onclick="$('.details1').slideToggle(function(){$('#more1').html($('.details1').is(':visible')?'':'{{$owner->name}}');});">
            <div class="form-control">{{$owner->name}} <span class="fa fa-pencil"></span></div>
          </a>
          </div>
          <div class="form-group">
              {{Form::label('storeName', 'Store Name')}}
              {{Form::text('storeName', $store->storeName,['class' => 'form-control', 'placeholder' => 'Enter Store Name'])}}
          </div>
          <div class="form-group">
              {{Form::label('storeDesc', 'Description')}}
              {{Form::textarea('storeDesc', $store->storeDesc,['class' => 'form-control', 'placeholder' => 'Enter Store Description', 'rows' => '5'])}}
          </div>
          <div class="form-group">
              {{Form::label('storeImage', 'Upload Store Photo')}}
              {{Form::file('storeImage')}}
          </div>
          <div class="form-group">
              {{Form::text('orgID', $store->orgID,['class' => 'hidden'])}}
              {{Form::submit('Update',['class'=> 'btn btn-primary'])}}
          </div>
      {!! Form::close() !!}
    </div>
    </div>
@endsection
