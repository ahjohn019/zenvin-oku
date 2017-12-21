<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Profile;
use App\User;
use Auth;
use Redirect;
use Session;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            return view('profiles.show')->with('user',$user)->with('profiles', $user->profile);
        }
        return view('profiles.show');
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
            Session::flash('Customer', 'Customer');  
            return view('profiles.edit')->with('user',$user)->with('profile', $user->profile)->with('states',$data);
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
        $profile = Profile::find($id);
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
            $path = $request->file('profile_image')->storeAs('public/profile_images/customers', $fileNameToStore);
        }

        $user->email = $request->input('email');
        $profile->name = $request->input('name');
        $profile->contactNo = $request->input('contactNo');
        $profile->address = $request->input('address');
        $profile->state = $request->input('state');
        $profile->postCode = $request->input('postCode');
        if($request->hasFile('profile_image') && $profile->profile_image != 'noimage.jpg'){
            Storage::delete('public/profile_images/customers/'.$profile->profile_image);
            $profile->profile_image = $fileNameToStore;
        }
        $profile->save();
        $user->save();

        return redirect('profiles/'.$user->username)->with('update-success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        if(auth()->user()->user_type !== 'Admin'){
            Session::flash('access-denied', 'Access denied.');
            return view('profiles.restrict');
        }

        if($profile->profile_image != 'noimage.jpg'){
            Storage::delete('public/profile_images/customers'.$profile->profile_image);
        }

        $profile->delete();
        Session::flash('delete-success', 'Profile Deleted');
        return view('/');
    }
}
