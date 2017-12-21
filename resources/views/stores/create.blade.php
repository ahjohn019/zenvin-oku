@extends('master.marketmenutest')

@section('content')
<br><br><br><br>
    <div class="container" style="width:750px">
      <div class="panel panel-default">
      <div class="panel-heading"><h3><strong>Add New Store</strong></h3></div>
      {!! Form::open(array('route'=>'store.store', 'files'=>true)) !!}
          <div class="form-group">
          {{Form::label('storeOwner', 'Store Owner')}}
          <select class="form-control" name="private_id">
            <option value="" disabled selected>-Select store owner-</option>
            @foreach($privates as $private)
            @php $found = "false"; @endphp
              @foreach($stores as $store)
                @if($private->id == $store->private_id)
                  @php $found ="true"; @endphp
                @endif
              @endforeach
              @if($found == "false")
                <option value="{{$private->id}}">{{$private->name}} - {{$private->nric}} - {{$found}}</option>
              @endif
            @endforeach
          </select>
          </div>
          <div class="form-group">
              {{Form::label('storeName', 'Store Name')}}
              {{Form::text('storeName', '',['class' => 'form-control', 'placeholder' => 'Enter Store Name'])}}
          </div>
          <div class="form-group">
              {{Form::label('storeDesc', 'Description')}}
              {{Form::textarea('storeDesc', '',['class' => 'form-control', 'placeholder' => 'Enter Store Description', 'rows' => '5'])}}
          </div>
          <div class="form-group">
              {{Form::label('storeImage', 'Upload Store Photo')}}
              {{Form::file('storeImage')}}
          </div>
        <div class="form-group">
            @include('include.messages')
            {{Form::text('orgID', $organizationID,['class' => 'hidden'])}}
            {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
        </div>
      {!! Form::close() !!}
    </div>
    </div>
@endsection
