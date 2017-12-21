@extends('master.marketmenutest')

@section('content')
<div class="container" style="height:500px">
<header class="clearfix">
				<h1>Organizations</h1>
</header>

@foreach($organizations->chunk(3) as $organizationsChunk)
<div class="row" >
@foreach($organizationsChunk as $organization)

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    <a href="{{URL::to('org/details/' . $organization->id)}}"><img class ="myImg" src="{{asset('images/'.$organization->image)}}" height="150" weight="200" ></a>
    
    </div>
</div>

@endforeach
</div>

@endforeach
</div>


@endsection
