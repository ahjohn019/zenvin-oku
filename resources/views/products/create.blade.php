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
  <div class="panel-heading"><h3><strong>Add New Product </strong></div>
    {!! Form::open(array('route'=>'product.store', 'files'=>true)) !!}
    <div class="panel-body">
      @include('include.messages')
    </div>

        <div class="form-group">
            {{Form::label('productName', 'Name *')}}
            {{Form::text('productName', '',['class' => 'form-control', 'placeholder' => 'Enter Product Name','required' => 'required'])}}
        </div>
        <div class="form-group" >
            {{Form::label('productDesc', 'Description *')}}
            {{Form::textarea('productDesc', '',['class' => 'form-control', 'placeholder' => 'Enter Product Description', 'rows' => '5', 'required' => 'required'])}}
        </div>
        <div class="form-group">
          <table class="table">
            <tr>
              <td width="100px">{{Form::label('productPrice', 'Price (MYR) *')}}</td>
              <td width="50px">{{Form::text('productPrice', '',['class' => 'form-control', 'placeholder' => 'Enter Product Price', 'rows' => '1', 'required' => 'required'])}}</td>
              <td width="100px">{{Form::label('productQuantity', 'Quantity On Hand *')}}</td>
              <td width="50px">{{Form::text('productQuantity', '',['class' => 'form-control', 'placeholder' => 'Enter Quantity on hand' , 'required' => 'required'])}}</td>
            </tr>
            <tr>
              <td >{{Form::label('productWeight', 'Weight (Kg) *')}}</td>
              <td >{{Form::text('productWeight', '',['class' => 'form-control', 'placeholder' => 'Enter Weight' , 'required' => 'required'])}}</td>
              <td>{{Form::label('productCategory', 'Category *')}}</td>
              <td >{{Form::select('productCategory', [''=>'--Select Category--','TEXTILES' => 'TEXTILES','WOODCRAFT' => 'WOODCRAFT','PAPERCRAFT' => 'PAPERCRAFT','POTTERY/GLASSCRAFT' => 'POTTERY/GLASSCRAFT','JEWELLERY' => 'JEWELLERY','OTHERS' => 'OTHERS'],null,['class' => 'form-control'])}}</td>
            </tr>
            <tr>
            <td>{{Form::label('productPromo', 'Promotion *')}}</td>
              <td>{{Form::select('productPromo', [''=>'--Select Promotion--','LIGHTNINGDEALS' => 'LIGHTNINGDEALS','HOTDEALS' => 'HOTDEALS','RECOMMENDED' => 'RECOMMENDED'],null,['class' => 'form-control'])}}</td>
            </tr>
            <tr>
              <td colspan="2">Delivery Charges For:</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td >{{Form::label('deliveryEM', 'East Malaysia (RM)')}}</td>
              <td >{{Form::text('deliveryEM', '',['class' => 'form-control', 'placeholder' => 'Enter delivery Charges' , 'required' => 'required'])}}</td>
              <td>{{Form::label('deliveryWM', 'West Malaysia (RM)')}}</td>
              <td>{{Form::text('deliveryWM', '',['class' => 'form-control', 'placeholder' => 'Enter delivery Charges' , 'required' => 'required'])}}</td>
            </tr>
            <tr>
              <td colspan="4">Images</td>
            </tr>
            <tr>
              <td colspan="2">{{Form::label('productImage1', 'Upload Photo 1 *')}}</td>
              <td colspan="2">{{Form::file('productImage1',['class'=> 'btn btn-primary1'])}}</td>
            </tr>
            <tr>
              <td colspan="2">{{Form::label('productImage2', 'Upload Photo 2')}}</td>
              <td colspan="2">{{Form::file('productImage2',['class'=> 'btn btn-primary1'])}}</td>
            </tr>
            <tr>
              <td colspan="2">{{Form::label('productImage3', 'Upload Photo 3')}}</td>
              <td colspan="2">{{Form::file('productImage3',['class'=> 'btn btn-primary1'])}}</td>
            </tr>
          </table>
        </div>
        <div class="form-group">
              <h4>Mandatory Fields*</h4>
        </div>
        <div class="form-group">
              {{Form::text('storeID', $storeid,['class' => 'hidden'])}}
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

            {{Form::text('userid',Auth::user()->id, ['class'=>'hidden'])}}
            {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
        </div>

    {!! Form::close() !!}
  </div>
  </div><br><br><br><br>
@endsection
