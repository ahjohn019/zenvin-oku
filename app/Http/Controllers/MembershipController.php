<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Session;
use App\Organization;
use App\Membership;
use App\User;
use App\Package;
use Auth;
use DateTimeZone;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $package_list = Package::all();
        $organizations = Organization::all();
        return view('auth.orgSellerPackage')->with('package_list',$package_list)->with('organizations',$organizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user=Session::get('user');
        $profile=Session::get('profile');

        if(isset($user)){
        $this->validate($request,[
        'package_id' => 'required',
        ]);

        $dt = Carbon::now();
        $strt_dt = $dt->toDateString();
        $end_dt = $dt->addYears(1)->toDateString();

        $membership = new Membership(array(
            'package_id' => $request['package_id'],
            'start_date' => $strt_dt,
            'end_date' => $end_dt,
            'last_fee_pay_date' => $dt,
        ));
        
        $user->save();
        $profile = $user->org_profile()->save($profile);
      
        $membership = $user->membership()->save($membership);
        
        $admin=User::where('user_type', '=', 'Admin')->get();
        foreach ($admin as $adm){
            
              $adm->notify(new \App\Notifications\noticeRegister($adm));
            
        }

        Auth::login($user);
        Session::flash('register-success', 'User successfully created.');
        return redirect('/');
        }
        
        Session::flash('register-error', 'Session expired.');
        return redirect('/orgSellerRegister/user_info');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }

    public function orgRenew($membership_id)
    {
        $membership = Membership::find($membership_id);
        $dt = Carbon::now();
        $last_dt = $membership->end_date;
        if (is_string($last_dt)) {
            $last_dt = Carbon::parse($last_dt,new DateTimeZone('Asia/Kuala_Lumpur'));
        }
        $diff = $dt->diffInDays($last_dt,false);

        if($diff <= 31 && $diff >= 0){
            $end_dt = $last_dt->addYears(1)->toDateString();
            $membership->end_date = $end_dt;
            $membership->last_fee_pay_date = $dt;
        }
        elseif($diff < 0){
            $strt_dt = $dt->toDateString();
            $end_dt = $dt->addYears(1)->toDateString();
            $membership->start_date = $strt_dt;
            $membership->end_date = $end_dt;
            $membership->last_fee_pay_date = $dt;
        }
        $membership->save();

        Session::flash('payment-success', 'Membership fee paid.');
        return redirect('/');
    }
}
