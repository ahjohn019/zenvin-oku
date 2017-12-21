@extends('layouts.app')
<br>
@section('content')
<link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
<br><br>
<div class="container" >
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h1>Searching Panel</h1>
                    <form action="{{ route('AdminSearch')}}" method="post" role="search">
                        {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="criteria"
                                    placeholder="Search users"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" name="search">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        <br>

                        <button type="submit" class="btn btn-default" name="showAllSeller">
                                        Show All Seller
                                    </button>

                        <button type="submit" class="btn btn-default" name="showAllCustomer">
                                        Show All Customer
                                    </button>
                        <button type="submit" class="btn btn-default" name="pendingApprove">
                                        Pending Approve
                                    </button>
                    </form>


                     <hr>

                        @if(isset($message))
                            <p><b>{{ $message }}</b></p>
                        @endif
                        @if(isset($details))
                        <form action="{{ route('AdminApprove') }}" method="get" role="approve">
                            {{ csrf_field() }}
                            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                                <h2>User details</h2>

                                    <table class="table" style="border:1px solid black; overflow-x:scroll; table-layout:fixed;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th style="width:20%">Email</th>
                                                <th>User Type</th>
                                                <th>Organizations</th>
                                                <th>Activated</th>
                                                <th>Date register</th>
                                                <th>Certified doc</th>
                                                <th>Profile</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details as $user)
                                            <tr>
                                                <td><input type="checkbox" name="selection[]" class="checkboxes" value="{{ $user->id }}" /></td>
                                                <td>{{$user->username}}</td>
                                                <td  style="width:20%">{{$user->email}}</td>
                                                <td>{{$user->user_type}}</td>
                                                <td>{{$user->org_profile->orgName}}</td>
                                                @if($user->activated==1)
                                                    <td>Yes</td>
                                                @else
                                                    <td>No</td>
                                                @endif
                                                <td>{{ $user->created_at }}</td>
                                                @if($user->user_type=="OrgSeller")
                                                    <td><a href="/storage/certificate_docs/org_seller/{{$user->org_profile->certificate_doc}}" data-lightbox="image-1" data-title="{{ $user->username }}">Show</a>
                                                    </td>
                                                @elseif($user->user_type=="PrivateSeller")
                                                    <td><a href="/storage/certificate_docs/private_seller/{{$user->private_profile->certificate_doc}}" data-lightbox="image-1" data-title="{{ $user->username }}">Show</a>
                                                    </td>
                                                @else
                                                    <td>----</td>
                                                @endif
                                                <td><button name="profile" role="button" value="{{ $user->id }}">View</button></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-default" name="activate"style="display: block; margin: 0 auto;">
                                       Activate/Deactivate
                                    </button>
                        </form>
                        @endif





                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br><br><br>
<script src="{{asset('js/lightbox-plus-jquery.js')}}"></script>
@endsection
