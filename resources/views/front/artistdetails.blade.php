@extends('master.marketmenutest')

@section('content')
<br><br><br><br>
<div class="container">
        <div class="page-header" id="features">
            <h1>Artist Details</h1>
        </div>

<div class="row">
        <div class="col-md-4">
        <img class ="myImg" src="{{asset('images/'.$artists->image)}}" height="200" weight="200" >
        </div>
        <div class="col-md-8">
                <h3>{{$artists->Name}}</h3>
                <p><strong>Email : </strong>{{$artists->Email}}</p>
                <p><strong>Talent : </strong> {{$artists->Talent}}</p>
                <p><strong>Service : </strong>{{$artists->Service}}</p>
                <p><strong>Handicraft : </strong>{{$artists->Handicraft}}</p>


        </div><!-- end col-md 8 -->
</div><!-- end of row -->

    <div class="spacer"></div>
<div class="row">
           <h3>There are other artists that you can further check!!</h3>
            @foreach($interested as $artists)
            <div class="col-md-3">
            <div class="thumbnail">
            <div class="caption text-center">
            <a href="{{url('artist/details',[$artists->id])}}"><img class ="myImg" src="{{asset('images/'.$artists->image)}}" height="150" weight="200" ></a>
            <a href="{{url('artist/details',[$artists->id])}}"><p>{{$artists->Name}}</p></a>
            </div>


            </div><!--end thumbnail-->
            </div><!--end col-md-3-->
            @endforeach
        </div>
        <div class="spacer"></div>
</div><!--End of Container-->

@endsection
