@extends('master.marketmenutest')

@section('content')
<br><br>
    <div class="container">
      <div class="panel panel-default">
      <div class="panel-heading"><h3><strong>Edit Store</strong></h3></div>
      @include('include.messages')
      {!! Form::model($store,array('route'=>['store.updateSeller',$store->id], 'method'=>'PUT', 'files'=>true)) !!}
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
