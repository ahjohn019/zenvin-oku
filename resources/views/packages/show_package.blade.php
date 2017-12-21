@extends('layouts.app')
<br>
@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h3>Membership packages</h3>
                     <hr>

                        <form action="{{ route('PackageManagement') }}" method="post" role="package">
                            {{ csrf_field() }}

                                    <table class="table" style="border:1px solid black; overflow-x:scroll; table-layout:fixed;">
                                        <thead>
                                            <tr>
                                                <th>Package name</th>
                                                <th style="width:20%">No. of Store</th>
                                                <th>No. of Product</th>
                                                <th>Price per year</th>
                                                <th>Date added</th>
                                                <th style="width:10%"></th>
                                                <th style="width:10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details as $package)
                                            <tr>
                                                <td>{{$package->package_name}}</td>
                                                <td  style="width:20%">{{$package->no_store_own}}</td>
                                                <td>{{$package->no_product_per_store}}</td>
                                                <td>{{$package->price_per_year}}</td>
                                                <td>{{$package->created_at}}</td>
                                                <td style="width:10%"><button name="edit" role="button" value="{{ $package->id }}">Edit</button></td>
                                                <td style="width:10%"><button name="delete" role="button" value="{{ $package->id }}">Delete</button></td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-default" name="add"style="display: block; margin: 0 auto;">
                                       Add new package
                                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
