<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Org_profile;
use App\Organization;
use App\User;
use App\Package;
use App\Store;
use App\Membership;
use App\Private_profile;
use App\Product;
use App\Service;
use App\Events;
use Auth;
use Redirect;
use Session;
use Carbon\Carbon;
use DateTimeZone;

class OrgProfileController extends Controller
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
    public function show($username)
    {
       
        $user = User::where('username',$username)->first();
        if ($user != null){
        $profile = $user->org_profile;
        $membership = $user->membership;
        $package = $membership->package;
        $stores = Store::all()->where('orgID','=',$profile->id)->where('status','=','Active');
        $products = Product::orderBy('created_at','ASC')->where('productStatus','=','PENDING')->get();
        $services = Service::orderBy('created_at','ASC')->where('serviceStatus','=','PENDING')->get();
        $events = Events::all()->where('orgID', '=',  $profile->id)->where('eventStatus', '!=',  'DELETED');
        $privates = Private_profile::all();
        $organizations = Organization::all();
        $dt = Carbon::now();
        $end_dt = $membership->end_date;
        if (is_string($end_dt)) {
            $end_dt = Carbon::parse($end_dt,new DateTimeZone('Asia/Kuala_Lumpur'));
        }

        $diff = $dt->diffInDays($end_dt,false);
            return view('profiles.showOrg')->with('user',$user)->with('profiles',$profile)->with('events',$events)->with('services',$services)->with('membership',$membership)->with('package',$package)->with('stores',$stores)->with('privates',$privates)->with('products',$products)->with('diff',$diff)->with('organizations',$organizations);
        }
        return view('profiles.showOrg');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username',$username)->first();
        if (($user != null && Auth::user()->username == $user->username)||(Auth::user()->isAdmin()==true)){
            $data = array(
                'KL'  => "Kuala Lumpur",
                'Labuan' => "Labuan",
                'Putrajaya' => "Putrajaya",
                'Kedah' => "Kedah",
                'Kelantan' => "Kelantan",
                'Johor' => "Johor",
                'Melaka' => "Melaka",
                'NS' => "Negeri Sembilan",
                'Pahang' => "Pahang",
                'Perak' => "Perak",
                'Perlis' => "Perlis",
                'Penang' => "Penang",
                'Sabah' => "Sabah",
                'Sarawak' => "Sarawak",
                'Selangor' => "Selangor",
                'Terengganu' => "Terengganu",
            );
            Session::flash('OrgSeller', 'OrgSeller');
            return view('profiles.edit')->with('user',$user)->with('profile', $user->org_profile)->with('states',$data);
        }
        Session::flash('access-denied', 'Access denied.');
        return view('profiles.restrict');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Org_profile::find($id);
        $user = User::where('id', $profile->user_id)->first();
        $this->validate($request, [
            'orgName' => array(
                'required',
                'string',
                'max:255',
                'Regex:/^[a-zA-Z]+(([\'\,\.\ \-][a-zA-Z ])?[a-zA-Z]*)*$/'
            ),
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'contactNo' => 'required|string|phone:MY|unique:profiles,contactNo,'.$profile->id,
            'address' => 'required|string|max:255',
            'state' => 'required',
            'profile_image' => 'image|nullable|max:1999',
            'postCode' => array(
                'required',
                'string',
                'Regex:/^[0-9]{5}$/'
            ),
        ]);

        if($request->hasFile('profile_image')){
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('profile_image')->storeAs('public/profile_images/org_seller', $fileNameToStore);
        }

        $user->email = $request->input('email');
        $profile->orgName = $request->input('orgName');
        $profile->contactNo = $request->input('contactNo');
        $profile->address = $request->input('address');
        $profile->state = $request->input('state');
        $profile->postCode = $request->input('postCode');
        if($request->hasFile('profile_image') && $profile->profile_image != 'noimage.jpg'){
            Storage::delete('public/profile_images/org_seller/'.$profile->profile_image);
            $profile->profile_image = $fileNameToStore;
        }
        $profile->save();
        $user->save();

        return redirect('org_profiles/'.$user->username)->with('update-success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Org_profile::find($id);

        if(auth()->user()->user_type !== 'Admin'){
            Session::flash('error', 'Access denied.');
            return view('profiles.restrict');
        }

        if($profile->profile_image != 'noimage.jpg'){
            Storage::delete('public/profile_images/'.$profile->profile_image);
        }

        $profile->delete();
        Session::flash('delete-success', 'Profile Deleted');
        return redirect('/');
    }

    public function addNewStore($organizationID){
       $organization = Org_profile::find($organizationID);
       $user = User::find($organization->user_id);
       $membership = Membership::all()->where('user_id','=',$user->id)->first();
       $package = Package::find($membership->package_id);
       $countStore = Store::all()->where('orgID','=',$organizationID)->where('status','=','Active')->count();
       $privates = Private_profile::all()->where('org_id','=',$organizationID);
       $stores = Store::all()->where('orgID', '=',  $organizationID);
        if ($countStore >= $package->no_store_own) {
          return redirect('org_profiles/'.$user->username)->with('overStore','You have own the maximum number of stores, please upgrade your package to create more store.');
        }
        else {
          return view('stores.create')->with('organizationID',$organizationID)->with('privates',$privates)->with('stores',$stores);
        }

     }

     public function addNewEvent($organizationID){
        $organization = Org_profile::find($organizationID);
        $user = User::find($organization->user_id);
        $membership = Membership::all()->where('user_id','=',$user->id)->first();
        $package = Package::find($membership->package_id);
        $countStore = Store::all()->where('orgID','=',$organizationID)->where('status','=','Active')->count();

        $stores = Store::all()->where('orgID', '=',  $organizationID);
         //if ($countStore >= $package->no_store_own) {
        //   return redirect('org_profiles/'.$user->username)->with('overStore','You have own the maximum number of stores, please upgrade your package to create more store.');
        // }
        // else {
           return view('events.create')->with('ID',$organizationID);
      //   }

      }
}
