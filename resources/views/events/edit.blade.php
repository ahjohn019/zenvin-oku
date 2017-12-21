@extends('master.marketmenutest')
<style media="screen">
.form-group {
  margin-bottom: 5px;
  padding: 5px;
}
</style>
@section('content')
<br><br><br><br>
<div class="container" style="width:800px">
      <div class="panel panel-default">
      <div class="panel-heading"><h3><strong>Add New event</strong></h3></div>
      {!! Form::model($event,array('route'=>['events.update',$event->id], 'method'=>'PUT', 'files'=>true)) !!}
      <div class="form-group">
          {{Form::label('eventName', 'Name*')}}
          {{Form::text('eventName', $event->eventName,['class' => 'form-control', 'placeholder' => 'Enter event Name','required' => 'required'])}}
      </div>
      <div class="form-group">
          {{Form::label('eventDesc', 'Description*')}}
          {{Form::textarea('eventDesc', $event->eventDesc,['class' => 'form-control', 'placeholder' => 'Enter event Description', 'rows' => '5','required' => 'required'])}}
      </div>
      <div class="form-group">
          {{Form::label('eventLocation', 'Venue*')}}
          {{Form::textarea('eventLocation', $event->eventLocation,['class' => 'form-control', 'placeholder' => 'Enter Location','rows' => '3','required' => 'required'])}}
      </div>
      <div class="form-group">
        <table class="table">
          <tr>
            <td width="130px">{{Form::label('eventStartDate', 'Start Date*')}}</td>
            <td width="80px">{{Form::date('eventStartDate',$event->eventStartDate,['class' => 'form-control'])}}</td>
            <td width="120px">{{Form::label('eventEndDate', 'End Date*')}}</td>
            <td width="80px">{{Form::date('eventEndDate',$event->eventEndDate,['class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <td>{{Form::label('eventStartTime', 'Start Time*')}}</td>
            <td>{{Form::time('eventStartTime',$event->eventStartTime,['class' => 'form-control'])}}</td>
            <td>{{Form::label('eventEndTime', 'End Time*')}}</td>
            <td>{{Form::time('eventEndTime',$event->eventEndTime,['class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <td>{{Form::label('eventType', 'Type*')}}</td>
            <td>{{Form::select('eventType', [''=>'--Select Type--','CONCERT' => 'CONCERT','FOOD FAIR' => 'FOOD FAIR','STUFF SELLING' => 'STUFF SELLING','TALENT SHOW' => 'TALENT SHOW','OTHERS' => 'OTHERS'],null,['class' => 'form-control'])}}</td>
            <td>{{Form::label('eventPrice', 'Entry/Ticket Price*')}}</td>
            <td>{{Form::text('eventPrice', $event->eventPrice,['class' => 'form-control', 'placeholder' => 'Enter Price','required' => 'required'])}}</td>
          </tr>
          <tr>
            <td>{{Form::label('eventCouponPrice', 'Coupon Price')}}</td>
            <td>{{Form::text('eventCouponPrice', $event->eventCouponPrice,['class' => 'form-control', 'placeholder' => 'Enter Price','required' => 'required'])}}</td>
            <td>{{Form::label('eventStatus', 'Status')}}</td>
            <td>{{ Form::select('eventStatus', ['ACTIVE' => 'ACTIVE','DEACTIVE' => 'DEACTIVE'],null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <td>{{Form::label('eventCouponDesc', 'Coupon Description')}}</td>
            <td colspan="3">{{Form::textarea('eventCouponDesc', $event->eventCouponDesc,['class' => 'form-control', 'placeholder' => 'Enter Description','rows' => '3','required' => 'required'])}}</td>
          </tr>
          <tr>
            <td colspan="2">{{Form::label('eventImage', 'Upload Event Photo*')}}</td>
            <td colspan="2">{{Form::file('eventImage')}}</td>
          </tr>
        </table>
      </div>
      <div class="form-group">
            <h4>Mandatory Fields*</h4>
      </div>
      <div class="form-group">
          <table>
            <tr><td>Terms and Conditions</td></tr>
            <tr><td><font size="2">
              By using the Site, the User is deemed to have agreed to be bound by the terms and conditions
              set out in this agreement ('the Agreement'), as well as those terms and conditions incorporated
              by reference and/or implication.
              The Company may amend the terms and conditions from time to time.
              The User will be notified of any amendments via announcement on the Site.</td>
            </font></tr>
          </table>
      </div>
      <div class="form-group">
          <table>
            <tr><td><b>By submitting the ad, I confirm that I have read, understood and accepted the
              <a href="#">Rules of Advertising</a>, <a href="#">Terms & Conditions</a> of E-OKU Marketplace and
              <a href="#">Personal Data Protection Notice</a>.</b></td></tr>
          </table>
      </div>
        <div class="form-group">
            @include('include.messages')
            {{Form::text('orgID', $event->orgID,['class' => 'hidden'])}}
            {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
        </div>
      {!! Form::close() !!}
    </div>
    </div><br><br><br><br>
@endsection
