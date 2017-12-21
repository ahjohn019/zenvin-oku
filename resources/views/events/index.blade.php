@extends('master.marketmenutest')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')

<br><br>
<div class="container">
      <table>
        <tr>
          <td style="padding:10px" width="250px"><h1><b>Events</b></h1></td>
          <td><form action="{{route('events.index')}}" method="get" class="form-inline">
          <div class="form-group">
          <input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
          <div class="form-group">
          <button class="btn btn-success" type="submit">Search</button>
          </div>

          <a href="{{route('events.index')}}"><button class="btn btn-primary1" type="button" >Clear</button></a>
          </form>
          </div></td>
        </tr>
      </table>
      <table>
    <tr>
        <td style="padding:2px" width="50px" height="50px">Sort: </td>
        <td style="padding:2px" width="100px">@sortablelink('eventName','Name')</td>
        <td style="padding:2px" width="100px">@sortablelink('eventPrice','Price')</td>
        <td style="padding:2px" width="100px">@sortablelink('eventStartDate','Date')</td>
        <td style="padding:2px" width="100px">@sortablelink('eventStartTime','Time')</td>
        <td style="padding:2px" width="90px">@sortablelink('eventType','Type')</td>
        <td style="padding:2px" width="110px">@sortablelink('created_at','Created')</td>
        <td style="padding:2px" width="100px">@sortablelink('updated_at','Latest')</td>
    </tr>

</table>
</div>
<div>
    <div class="container" style="height:500px" >
            @if(count($events) == 0)
            <h2 class="prodheading">No Events Found!</h2>
            @else

              @foreach ($events as $key => $event)
                  @if($event->eventStatus == 'ACTIVE')

                    <a href="{{route('events.show',$event->id)}}" style="color:black">

                    <div class="col-sm-4">
                        <div style="background-color: white">

                                  <table  class="table" >
                                    <tr >
                                      <td align="Center" colspan="2"><img src="/image/events/{{$event->eventImage}}"  style="max-height:300px; vertical-align: middle" class="img-responsive"></td>
                                    </tr>
                                    <tr >
                                      <td align="left" colspan="2">
                                        <div class="" style="white-space: nowrap;   width: 11em;   overflow: hidden;  text-overflow: ellipsis; ">
                                          <b>{{$event->eventName}}</b>
                                        </div>

                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="color:red"><b>RM{{$event->eventPrice}}</b><br>{{$event->eventType}}</td>
                                      @foreach($orgs as $org)
                                          @if($event->orgID == $org->id)
                                            <td style="color:grey" class="pull-right"><i>{{$org->orgName}}<i></td>
                                          @endif
                                      @endforeach

                                    </tr>
                                  </table>

                      </div>
                    </div>
                    </a>
                  @endif
              @endforeach
              @endif
    </div>
</div><br><br>

<div class="container">
  <div class="pull-right">
    {!! $events->appends(\Request::except('page'))->render() !!}
  </div>
</div>




@endsection
