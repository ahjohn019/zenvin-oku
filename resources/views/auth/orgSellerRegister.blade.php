@extends('master.marketmenutest')

@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Organisation Seller Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('OrgRegisterStep1') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('orgName') ? ' has-error' : '' }}">
                            <label for="orgName" class="col-md-4 control-label">Organisation name</label>

                            <div class="col-md-6">
                                <input id="orgName" type="text" class="form-control" name="orgName" value="{{ old('orgName') }}" required>
                           
                                @if ($errors->has('orgName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('orgName') }}</strong>
                                    </span>
                                @endif

                                
                            </div>
                        </div>

               
             
                          <div class="form-group{{ $errors->has('orgNo') ? ' has-error' : '' }}">
                            <label for="orgNo" class="col-md-4 control-label">Organisation registration No</label>

                            <div class="col-md-6">
                                <input id="orgNo" type="text" class="form-control" name="orgNo" value="{{ old('orgNo') }}" required>

                                @if ($errors->has('orgNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('orgNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                            <label for="contact_person" class="col-md-4 control-label">Contact Person</label>

                            <div class="col-md-6">
                                <input id="contact_person" type="text" class="form-control" name="contact_person" value="{{ old('contact_person') }}" required>

                                @if ($errors->has('contact_person'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contactNo') ? ' has-error' : '' }}">
                            <label for="contactNo" class="col-md-4 control-label">Contact Number</label>

                            <div class="col-md-6">
                                <input id="contactNo" type="text" class="form-control" name="contactNo" value="{{ old('contactNo') }}" required>

                                @if ($errors->has('contactNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('certificate_doc_org') ? ' has-error' : '' }}">
                            <label for="certificate_doc_org" class="col-md-4 control-label">Certificate document</label>

                            <div class="col-md-6">
                                <input id="certificate_doc_org" type="file" name="certificate_doc_org">
                                <small>Please upload copy of organization lessen/certificate document</small>

                                @if ($errors->has('certificate_doc_org'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certificate_doc_org') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" cols="50" rows="5" class="form-control" name="address" required>{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postCode') ? ' has-error' : '' }}">
                            <label for="postCode" class="col-md-4 control-label">Postcode</label>

                            <div class="col-md-6">
                                <input id="postCode" type="text" class="form-control" name="postCode" value="{{ old('postCode') }}" required>

                                @if ($errors->has('postCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <select class="form-control" id="state" name="state" required>
                                    <option value="" disabled @if (old('state') == "") selected="selected" @endif>Please select state</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state }}" @if (old('state') == "{{ $state }}") selected="selected" @endif>{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
                            <label for="profile_image" class="col-md-4 control-label">Profile Picture</label>

                            <div class="col-md-6">
                                <input id="profile_image" type="file" name="profile_image">

                                @if ($errors->has('profile_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-4 control-label control-label">Terms and Conditions</label>
                            <div class="col-md-6">
                                <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                                    <p>#Insert Terms and Conditions here</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agree" /> Agree with the terms and conditions
                                            @if ($errors->has('agree'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('agree') }}</strong>
                                            </span>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url()->previous() }}" class="btn btn-default btn-close">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Proceed
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
