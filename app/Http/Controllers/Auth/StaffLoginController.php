<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
class StaffLoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest:staff', ['except' =>['staffLogout']]);
    }

    public function showLoginForm()
    {
        return view('staff.staff-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request,[
            'email'=>'email | required | unique:users',
            'password'=>'required|min:4'
        ]);
        //attempt to log the user in
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
        //if successful, redirect to intend location
      
        return redirect()->intended(route('admin.dashboard'));
        }
        //if failed, redirect back to login form with data
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function staffLogout()
    {
        Auth::guard('staff')->logout();
        return redirect('/');
    }
}
