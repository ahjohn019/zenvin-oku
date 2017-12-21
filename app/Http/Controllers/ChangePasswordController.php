<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Hash;
use Session;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function chgPassForm()
    {
        return view('auth.passwords.change_password');
    }
    public function chgPassFormPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'passwordold' => 'required|passcheck',
            'newpassword' => 'required|string|min:6|confirmed|different:passwordold',
        ]);
        
        if ($validator->passes()) {
            $request->user()->fill([
                'password' => Hash::make($request->newpassword)
            ])->save();
            Auth::logout();
            return view('auth.passwords.change_succeed')->with('success', 'Password Changed');
        }

        Session::flash('password-error', 'Password NOT Changed');
        return back();
    }
   
}
