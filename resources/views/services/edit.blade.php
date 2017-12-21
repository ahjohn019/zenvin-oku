@extends('master.marketmenutest')
<style media="screen">
.form-group {
  margin-bottom: 5px;
  padding: 5px;
}
</style>
@section('content')
<br><br>
<div class="container" style="width:800px">
  <div class="panel panel-default">
  <div class="panel-heading"><h3><strong>Edit Services </strong></h3></div>
  <div class="panel-body">
    @include('include.messages')
  </div>
    {!! Form::model($service,array('route'=>['services.update',$service->id], 'method'=>'PUT', 'files'=>true)) !!}
    <div class="form-group">
        {{Form::label('serviceName', 'Name')}}
        {{Form::text('serviceName',  $service->serviceName,['class' => 'form-control', 'placeholder' => 'Enter Service Name','required' => 'required'])}}
    </div>
    <div class="form-group" >
        {{Form::label('serviceDesc', 'Description')}}
        {{Form::textarea('serviceDesc', $service->serviceDesc ,['class' => 'form-control', 'placeholder' => 'Enter service Description', 'rows' => '3','required' => 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('serviceTNC', 'Terms and conditions')}}
        {{Form::textarea('serviceTNC', $service->serviceTNC,['class' => 'form-control', 'placeholder' => 'Enter Terms and conditions', 'rows' => '3','required' => 'required'])}}
      </div>
      <div class="form-group">
        {{Form::label('serviceInstruction', 'Redeem instructions')}}
        {{Form::textarea('serviceInstruction',  $service->serviceInstructions,['class' => 'form-control', 'placeholder' => 'Enter Instruction', 'rows' => '3','required' => 'required'])}}
      </div>
      <div class="form-group">
        {{Form::label('serviceLocation', 'Location (address)')}}
        {{Form::textarea('serviceLocation', $service->serviceLocation,['class' => 'form-control', 'placeholder' => 'Enter Location', 'rows' => '2','required' => 'required'])}}
    </div>
      <div class="form-group">
        <table class="table">
          <tr>
            <td width="80px">{{Form::label('serviceValidPeriod', 'Valid Until')}}</td>
            <td width="100px">{{Form::date('serviceValidPeriod',null,['class' => 'form-control'])}}</td>
            <td width="80px">{{Form::label('serviceType', 'Type of Service')}}</td>
            <td width="100px">{{Form::select('serviceType', ['TEXTILES' => 'TEXTILES','WOODCRAFT' => 'WOODCRAFT','PAPERCRAFT' => 'PAPERCRAFT','POTTERY/GLASSCRAFT' => 'POTTERY/GLASSCRAFT','JEWELLERY' => 'JEWELLERY','OTHERS' => 'OTHERS'],null,['class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <td>{{Form::label('servicePrice', 'Price (MYR)')}}</td>
            <td>{{Form::text('servicePrice', $service->servicePrice,['class' => 'form-control', 'placeholder' => 'Enter service Price', 'rows' => '1','required' => 'required'])}}</td>
            <td>{{Form::label('serviceUnits', 'Units Measure')}}</td>
            <td>{{Form::select('serviceUnits', [''=>'--Select Units--','HOUR' => 'per HOUR','DAY' => 'per DAY','WEEK' => 'per WEEK','MONTH' => 'per MONTH','PERSON' => 'per PERSON','SESSION' => 'per SESSION'],null,['class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <td>Availability Period</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>{{Form::label('serviceAvailableStart', 'Start')}}</td>
            <td>{{Form::time('serviceAvailableStart',null,['class' => 'form-control'])}}</td>
            <td>{{Form::label('serviceAvailableEnd', 'End')}}</td>
            <td>{{Form::time('serviceAvailableEnd',null,['class' => 'form-control'])}}</td>

          </tr>
          <tr>
            <td>{{Form::label('serviceStatus', 'Status')}}</td>
            <td >{{ Form::select('serviceStatus', ['ACTIVE' => 'ACTIVE','DEACTIVE' => 'DEACTIVE'],null,['class' => 'form-control']) }}</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2">{{Form::label('serviceImage', 'Upload Photo')}}</td>
            <td colspan="2">{{Form::file('serviceImage',['class'=> 'btn btn-primary1'])}}</td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
      <div class="form-group">
            <h4>Mandatory Fields*</h4>
      </div>
        {{Form::text('storeID',$service->storeID,['class' => 'hidden'])}}
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
          {{Form::text('userid',Auth::user()->id, ['class'=>'hidden'])}}
            {{Form::submit('Submit',['class'=> 'btn btn-primary1'])}}
        </div>
    {!! Form::close() !!}
  </div>
  </div>
@endsection
