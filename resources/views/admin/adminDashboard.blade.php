@extends('master.marketmenutest')

<br>
@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-default">
                <div class="panel-heading"><h2>Admin Dashboard</h2>
                    <hr>
                <div class="row">
                    <nav class="col-sm-3 col-md-4 d-none d-sm-block bg-light sidebar">

                          <ul class="nav nav-pills flex-column">

                            <li class="nav-item">
                              <a class="nav-link" href= {{ route('ShowAdminRegister') }}> Assign Admin</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href= {{ route('ShowAdminApproval') }}>Account Approval</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href= {{ route('ShowMembership') }}>Membership Management</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href= {{ route('PackageList') }}>Manage Packages</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/admin/dashboard">Manage Categories</a>
                            </li>
                          </ul>
                    </nav>

                    <div class="container col-sm-6 col-md-6 ">
                                <h4>Account Details</h4>
                                    <table align="right" class="table table-bordered" >
                                        <tr>
                                        <th>Username</th>
                                        <td>{{$user->username}}</td>
                                        </tr>
                                        <tr>
                                        <th>Email</th>
                                        <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                        <th>User Type</th>
                                        <td>{{$user->user_type}}</td>
                                        </tr>
                                        <tr>
                                        <th>Last Login At</th>
                                        <td>{{$user->last_login_at}}</td>
                                        </tr>
                                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




</div><br><br><br><br><br><br>
@endsection
