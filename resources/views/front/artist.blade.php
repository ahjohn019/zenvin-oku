@extends('master.marketmenutest')

@section('content')
<br><br><br><br>
<div class="container">
<header class="clearfix">
				<h1>Artist List</h1>
</header>

@foreach($artists->chunk(3) as $artistchunk)
<div class="row" >
@foreach($artistchunk as $artist)

<div class="col-sm-4 col-md-4">
    <div class="thumbnail">
    <img class ="myImg" src="{{asset('images/'.$artist->image)}}" height="150" weight="200" >
      <div class="caption">
        <h3>Artist Name :{{$artist->Name}}</h3>
        <p class="description">
        <!--<strong>Email : </strong>{{$artist->Email}}</br>
        <strong>Talent : </strong>{{$artist->Talent}}</br>
        <strong>Service : </strong>{{$artist->Service}}</br>
        <strong>Handicraft : </strong>{{$artist->Handicraft}}</br>-->
        </p>
        <div class="clearfix"><p><a href="{{URL::to('artist/details/' . $artist->id)}}" class="btn btn-success pull-right" >Details</a> </p></div>
      </div>
    </div>
  </div>


@endforeach
</div>

@endforeach
@endsection
