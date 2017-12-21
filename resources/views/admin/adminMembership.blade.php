@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                        <button type="submit" class="btn btn-default" name="showAllOrg">
                                        All organisation
                                    </button>

                        <button type="submit" class="btn btn-default" name="soonExpire">
                                       Expire soon
                                    </button>

                        <button type="submit" class="btn btn-default" name="expired">
                                       Expired
                                    </button>


                    </form>


                     <hr>

                        @if(isset($message))
                            <p><b>{{ $message }}</b></p>
                        @endif
                        @if(isset($details))
                        <form action="{{ route('MembershipManagement') }}" method="get" role="membership">
                            {{ csrf_field() }}
                            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                                <h2>User details</h2>
                                    <table class="table" style="border:1px solid black; overflow-y:scroll; table-layout:fixed;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>

                                                <th>Start date</th>
                                                <th>End date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details as $user)
                                            <tr>
                                                <td><input type="checkbox" name="selection[]" class="checkboxes" value="{{ $user->id }}" /></td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->membership['start_date']}}</td>
                                                <td>{{$user->membership['end_date']}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-default" name="notify" style="display: block; margin: 0 auto;">
                                       Notify
                                    </button>
                        </form>
                        @endif





                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br><br><br>

@endsection
