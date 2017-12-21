@extends('master.marketmenutest')

@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Private Seller Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PrivateRegister') }}" enctype="multipart/form-data">
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



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <label><input type="radio" name="gender" value="Female" @if (old('gender') == "" || old('gender') == "Female") checked="checked" @endif required>Female</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="gender" value="Male" @if (old('gender') == "Male") checked="checked" @endif required>Male</label>
                            </div>
                            @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('nric') ? ' has-error' : '' }}">
                            <label for="nric" class="col-md-4 control-label">NRIC</label>

                            <div class="col-md-6">
                                <input id="nric" type="text" class="form-control" name="nric" value="{{ old('nric') }}" required>

                                @if ($errors->has('nric'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nric') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="hasDisability" class="col-md-4 control-label">Do you have disability</label>
                            <div class="col-md-6">
                                <label><input type="radio" name="hasDisability" id="disabled_yes" value="yes" checked="checked" required>Yes</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="hasDisability" id="disabled_no" value="no" required>No</label>
                            </div>
                            @if ($errors->has('hasDisability'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hasDisability') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('disability') ? ' has-error' : '' }}" id="disability_block">
                            <label for="disability" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select class="form-control" id="disability" name="disability">
                                    <option value="" disabled @if (old('disability') == "") selected="selected" @endif>Please select your disability category</option>
                                    @foreach($disability as $listitem)
                                        <option value="{{ $listitem }}" @if (old('disability') == "{{ $listitem }}") selected="selected" @endif>{{ $listitem }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('disability'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('disability') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nOku') ? ' has-error' : '' }}" id="nOku_block">
                            <label for="nOku" class="col-md-4 control-label">NOKU</label>

                            <div class="col-md-6">
                                <input id="nOku" type="text" class="form-control" name="nOku" value="{{ old('nOku') }}">
                                <small for="nOku">Eg: DE140011000001</small>
                                @if ($errors->has('nOku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nOku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('certificate_doc_oku') ? ' has-error' : '' }}">
                            <label for="certificate_doc_oku" class="col-md-4 control-label">Certificate document</label>

                            <div class="col-md-6">
                                <input id="certificate_doc_oku" type="file" name="certificate_doc_oku">
                                <small id="doc_desc">Please upload copy of your OKU card/certificate document</small>

                                @if ($errors->has('certificate_doc_oku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certificate_doc_oku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="org_id" class="col-md-4 control-label">Organization</label>

                            <div class="col-md-6">
                                <select class="form-control" id="org_id" name="org_id" required>
                                    <option value="" disabled @if (old('org_id') == "") selected="selected" @endif>Please select your organization</option>
                                    @foreach($org_name_list as $orgID => $orgName)
                                        <option value="{{ $orgID }}" @if (old('org_id') == "{{ $orgID }}") selected="selected" @endif>{{ $orgName }}</option>
                                    @endforeach
                                </select>
                                <small><span style="color:red">*If your organization is not in the list, it means your organization is not registered on this website.</span></small>
                            </div>

                            @if ($errors->has('org_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('org_id') }}</strong>
                                </span>
                            @endif
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

                            @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
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
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                                <a href="/" class="btn btn-default btn-close">
                                    cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
