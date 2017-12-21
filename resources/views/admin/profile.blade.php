@extends('layouts.app')
<br>
@section('content')

<div class="container">

<br>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-default">
                <div class="panel-heading"><h2>Admin Dashboard</h2>
                    <hr>
                <div class="row">


                    <div class="col-sm-6 col-md-4 ">
                    <div class="thumbnail">
                    <img class ="myImg" src="#" height="150" weight="200" >
                            <div class="caption">
                            <a href="{{route('org.dashboard')}}"> <img src="../image/org_oku.png" class="center" alt="Avatar" style="width:100px"></a>
                              <h3><a href="{{route('org.dashboard')}}">Organization</a></h3>

                            </div>
                          </div>
                    </div>
                    <div class="col-sm-6 col-md-4 ">
                    <div class="thumbnail">
                    <img class ="myImg" src="#" height="150" weight="200" >
                            <div class="caption">
                            <a href="{{route('usertype.dashboard')}}"> <img src="../image/users_oku.png" class="center" alt="Avatar" style="width:100px"></a>
                              <h3><a href="{{route('usertype.dashboard')}}">UserTypes</a></h3>

                            </div>
                          </div>
                    </div>


                    <div class="col-sm-6 col-md-4 ">
                    <div class="thumbnail">
                    <img class ="myImg" src="#" height="150" weight="200" >
                            <div class="caption">
                            <a href="{{route('artist.dashboard')}}"><img src="../image/talent_oku.png" class="center" alt="Avatar" style="width:100px"></a>
                              <h3><a href="{{route('artist.dashboard')}}">Artist</a></h3>

                            </div>
                          </div>
                    </div>

                    <div class="container col-sm-6 col-md-4 ">
                    <div class="thumbnail">
                    <img class ="myImg" src="#" height="150" weight="200" >
                            <div class="caption">
                            <a href="{{route('feedback.dashboard')}}"><img src="../image/feedback_oku.png" class="center" alt="Avatar" style="width:100px"></a>
                              <h3><a href="{{route('feedback.dashboard')}}">Feedback</a></h3>

                            </div>
                          </div>

                    </div>

                </div>
                <hr>
            </div>
        </div>
    </div>
    </div>




</div>


@endsection
