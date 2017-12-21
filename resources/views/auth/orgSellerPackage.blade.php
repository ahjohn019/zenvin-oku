@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container">
@if(session('register-error'))
<div class="alert alert-success">
    <strong>{{ Session::get('register-error') }}</strong>
</div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Membership pakage</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('OrgRegisterStep2') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <div class="row">
                        <div class="container col-sm-6 col-md-6">
                            <h4>Available Packages</h4>
                            <table class="table table-bordered">
                                <tr>
                                <th>Package Name</th>
                                <th>Number of store</th>
                                <th>Number of product per store</th>
                                <th>Price per year</th>
                                </tr>
                                @foreach($package_list as $package)
                                    <tr>
                                    <td>{{$package->package_name}}</td>
                                    <td>{{$package->no_store_own}}</td>
                                    <td>{{$package->no_product_per_store}}</td>
                                    <td>{{$package->price_per_year}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Package</label>

                            <div class="col-md-6">
                                <select class="form-control" id="package_id" name="package_id" required>
                                    <option value="" disabled @if (old('package_id') == "") selected="selected" @endif>Please select desired package</option>
                                    @foreach($package_list as $package)
                                        <option value="{{ $package->id }}" @if (old('package_id') == "{{ $package->id }}") selected="selected" @endif>{{ $package->package_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url()->previous() }}" class="btn btn-default btn-close">
                                    Back
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Pay
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
