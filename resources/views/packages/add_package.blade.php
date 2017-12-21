@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new packages</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('packages') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('package_name') ? ' has-error' : '' }}">
                            <label for="package_name" class="col-md-4 control-label">Package Name</label>

                            <div class="col-md-6">
                                <input id="package_name" type="text" class="form-control" name="package_name" value="{{ old('package_name') }}" required autofocus>

                                @if ($errors->has('package_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('package_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_of_store_own') ? ' has-error' : '' }}">
                            <label for="no_of_store_own" class="col-md-4 control-label">Number of Store Own</label>

                            <div class="col-md-6">
                                <input id="no_of_store_own" type="text" class="form-control" name="no_of_store_own" value="{{ old('no_of_store_own') }}" required>

                                @if ($errors->has('no_of_store_own'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_of_store_own') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_of_product_per_store') ? ' has-error' : '' }}">
                            <label for="no_of_product_per_store" class="col-md-4 control-label">Number of Product Per Store</label>

                            <div class="col-md-6">
                                <input id="no_of_product_per_store" type="text" class="form-control" name="no_of_product_per_store" value="{{ old('no_of_product_per_store') }}" required>

                                @if ($errors->has('no_of_product_per_store'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_of_product_per_store') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price_per_year') ? ' has-error' : '' }}">
                            <label for="price_per_year" class="col-md-4 control-label">Price Per Year</label>

                            <div class="col-md-6">
                                <input id="price_per_year" type="text" class="form-control" name="price_per_year" value="{{ old('price_per_year') }}" required>
                                @if ($errors->has('price_per_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_per_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>

                                <a href="/" class="btn btn-default btn-close">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
