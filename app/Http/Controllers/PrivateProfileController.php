<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Private_profile;
use App\User;
use App\Store;
use App\Product;
use App\Service;
use Auth;
use Redirect;
use Session;
use Carbon\Carbon;
use DateTimeZone;

class PrivateProfileController extends Controller
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
        $profile = $user->private_profile;
        $org = $profile->org_profile;
        $membership = $org->user->membership;
        $store = Store::where('private_id',$profile->id)->where('status','=','Active')->first();
        $products = Product::all()->where('storeID','=', $store->id)->where('productStatus','!=','DELETED');
        $services = service::all()->where('storeID', '=',  $store->id)->where('serviceStatus', '!=',  'DELETED');
        $dt = Carbon::now();
        $end_dt = $membership->end_date;
        if (is_string($end_dt)) {
            $end_dt = Carbon::parse($end_dt,new DateTimeZone('Asia/Kuala_Lumpur'));
        }
        $diff = $dt->diffInDays($end_dt,false);
            return view('profiles.showPrivate')->with('user', $user)->with('profiles', $profile)->with('services', $services)->with('products', $products)->with('organization', $org)->with('membership', $membership)->with('store',$store)->with('diff', $diff);
        }
        return view('profiles.showPrivate');
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
            Session::flash('PrivateSeller', 'PrivateSeller');
            return view('profiles.edit')->with('user',$user)->with('profile', $user->private_profile)->with('states',$data);
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
        $profile = Private_profile::find($id);
        $user = User::where('id', $profile->user_id)->first();
        $this->validate($request, [
            'name' => array(
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
            $path = $request->file('profile_image')->storeAs('public/profile_images/private_seller', $fileNameToStore);
        }

        $user->email = $request->input('email');
        $profile->name = $request->input('name');
        $profile->contactNo = $request->input('contactNo');
        $profile->address = $request->input('address');
        $profile->state = $request->input('state');
        $profile->postCode = $request->input('postCode');
        if($request->hasFile('profile_image') && $profile->profile_image != 'noimage.jpg'){
            Storage::delete('public/profile_images/private_seller/'.$profile->profile_image);
            $profile->profile_image = $fileNameToStore;
        }
        $profile->save();
        $user->save();

        return redirect('private_profiles/'.$user->username)->with('update-success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Private_profile::find($id);

        if(auth()->user()->user_type !== 'Admin'){
            Session::flash('access-denied', 'Access denied.');
            return view('profiles.restrict');
        }

        if($profile->profile_image != 'noimage.jpg'){
            Storage::delete('public/profile_images/'.$profile->profile_image);
        }

        $profile->delete();
        Session::flash('delete-success', 'Profile Deleted');
        return redirect('/');
    }
}
