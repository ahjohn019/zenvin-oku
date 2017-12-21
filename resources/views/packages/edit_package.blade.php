@extends('layouts.app')

@section('content')
<br><br>
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif
<br><br>
<div class="panel panel-primary">
<div class="panel-heading"><h4><b>Edit Package</b></h4></div>
<div class="panel-body">

{!! Form::open(['action' => ['PackageController@update', $package->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {{ Form::label('package_name', 'Package Name')}}
        {{ Form::text('package_name', $package->package_name, ['class' => 'form-control col-md-6', 'placeholder' => 'Package Name'])}}
    </div>
    <div class="form-group">
        {{ Form::label('no_store_own', 'No. of store')}}
        {{ Form::text('no_store_own', $package->no_store_own, ['class' => 'form-control col-md-6', 'placeholder' => 'No. of store'])}}
    </div>
    <div class="form-group">
        {{ Form::label('no_product_per_store', 'No. of product per store')}}
        {{ Form::text('no_product_per_store', $package->no_product_per_store, ['class' => 'form-control col-md-6', 'placeholder' => 'No. of product per store'])}}
    </div>
    <div class="form-group">
        {{ Form::label('price_per_year', 'Price per year')}}
        {{ Form::text('price_per_year', $package->price_per_year, ['class' => 'form-control col-md-6', 'placeholder' => 'Price per year'])}}
    </div>

<hr/>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class' => 'btn btn-primary pull-right'])}}
{!! Form::close() !!}
</div>
</div>
@endsection
