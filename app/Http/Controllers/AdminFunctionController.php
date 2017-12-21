<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Membership;
use Carbon\Carbon;
use DateTimeZone;
use Notification;

class AdminFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admin.adminApproval');
    }
    
    public function showMembership()
    {
        
        return view('admin.adminMembership');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        
        if (isset($_POST['search'])) {
            $search = Input::get ( 'criteria' );
            $user = User::where('username','=',$search)->orWhere('email','=',$search)->get();
            if(count($user) > 0)
                return view('admin.adminApproval')->withDetails($user)->withQuery ( $search );
            else return view ('admin.adminApproval')->withMessage('No Details found. Try to search again !');
        } 
        else if (isset($_POST['showAllSeller'])){
            $user = User::where('user_type','=', 'OrgSeller')->get();
            if(count($user) > 0)
                return view('admin.adminApproval')->withDetails($user)->withQuery ( 'Show All Seller' );
            else return view ('admin.adminApproval')->withMessage('No Details found. Try to search again !');
        }
        elseif (isset($_POST['showAllCustomer'])) {
            $user = User::where('user_type','LIKE', '%Customer')->get();
            if(count($user) > 0)
                return view('admin.adminApproval')->withDetails($user)->withQuery ( 'Show All Customer' );
            else return view ('admin.adminApproval')->withMessage('No Details found. Try to search again !');
        }
        elseif (isset($_POST['pendingApprove'])) {
            $user = User::where('user_type','=','OrgSeller')->where('activated','=','0')->orderBy('created_at','asc')->get();
            if(count($user) > 0)
                return view('admin.adminApproval')->withDetails($user)->withQuery ( 'Pending for approve' );
            else return view ('admin.adminApproval')->withMessage('No Details found. Try to search again !');
        }
        elseif (isset($_POST['showAllOrg'])) {
            $user = User::where('user_type','LIKE', 'Org%')->get();
            if(count($user) > 0)
                return view('admin.adminMembership')->withDetails($user)->withQuery ( 'Show All Organisation' );
            else return view ('admin.adminMembership')->withMessage('No Details found. Try to search again !');
        }
        elseif (isset($_POST['soonExpire'])) {
            $user_list = User::where('user_type','LIKE', 'Org%')->get();
            $expr_user = collect();
            if(count($user_list) > 0){
                foreach($user_list as $user){
                    $today = Carbon::now();
                    $dt = $user->membership->end_date;
                    if (is_string($dt)) {
                        $dt = Carbon::parse($dt,new DateTimeZone('Asia/Kuala_Lumpur'));
                    }
                    $diff = $today->diffInDays($dt,false);
                    if($diff<=31 && $diff >= 0){
                        $expr_user->push($user);
                    }
                }
                return view('admin.adminMembership')->withDetails($expr_user)->withQuery ( 'Expire soon' );
            }
            else return view ('admin.adminMembership')->withMessage('No Details found. Try to search again !');
         }
                
        else {
            $user_list = User::where('user_type','LIKE', 'Org%')->get();
            $expr_user = collect();
            if(count($user_list) > 0){
                foreach($user_list as $user){
                    $today = Carbon::now();
                    
                    $dt = $user->membership->end_date;
                    if (is_string($dt)) {
                        $dt = Carbon::parse($dt,new DateTimeZone('Asia/Kuala_Lumpur'));
                    }
                    $diff = $today->diffInDays($dt,false);
                    if($diff < 0){
                        $expr_user->push($user);
                    }
                }
                return view('admin.adminMembership')->withDetails($expr_user)->withQuery ( 'Expired' );
            }
            else return view ('admin.adminMembership')->withMessage('No Details found. Try to search again !');
        }
    }
                
                
                
            
    public function approve(Request $request)
    {
        if (isset($_GET['activate'])){
        
            if(!empty($request['selection'])) {
            $checked_values = $request['selection'];
            foreach($checked_values as $val) {
               $user=User::where('id', '=', $val)->first();
                switch($user->activated){
                    case 1 : $user->activated=0;
                        break;
                    case 0 : $user->activated=1;
                }

                    $user->save();
                    $user->notify(new \App\Notifications\noticeApprove($user));

                }
                return view('admin.adminApproval')->withMessage("Account status of the selected users has been changed!");
            }

            else
                return view('admin.adminApproval')->withMessage("No user has been selected!");
        }
        
        if (isset($_GET['profile'])){
            
            $user=User::find($request['profile']);
            if ($user->user_type=='Customer')
                return view('profiles.show')->with('user',$user)->with('profiles', $user->profile);
            elseif ($user->user_type=='OrgSeller'){
                $profile = $user->org_profile;
                $membership = $user->membership;

                $dt = Carbon::now();
                $end_dt = $membership->end_date;
                if (is_string($end_dt)) {
                    $end_dt = Carbon::parse($end_dt,new DateTimeZone('Asia/Kuala_Lumpur'));
                }
                $diff = $dt->diffInDays($end_dt,false);
                return view('profiles.showOrg')->with('user',$user)->with('profiles',$profile)->with('membership',$membership)->with('diff',$diff);
            }
            
        }
    }
    
    
     public function membershipNotify(Request $request)
    {
        
            if(!empty($request['selection'])) {
            $checked_values = $request['selection'];
            foreach($checked_values as $val) {
               $user=User::where('id', '=', $val)->first();
               $user->notify(new \App\Notifications\noticeMembership($user));
                }
                return view('admin.adminMembership')->withMessage("Notification has been send");
                
            }

            else
                return view('admin.adminMembership')->withMessage("No user has been selected!");
        
        
    
     }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}