<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Overdide showRegistrationForm
     *
     */
    public function showRegistrationForm()
    {
        $states = array(
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
        return view("auth.register")->with('states', $states);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => array(
                'required',
                'string',
                'min:6',
                'unique:users',
                'Regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/'
            ),
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'name' => array(
                'required',
                'string',
                'max:255',
                'Regex:/^[a-zA-Z]+(([\'\,\.\ \-][a-zA-Z ])?[a-zA-Z]*)*$/'
            ),
            'nric' => array(
                'required',
                'max:12',
                'unique:profiles',
                'Regex:/^[0-9][0-9][0-1][0-9][0-3][0-9]{7}$/',
                'nric_valid',
                'age_valid:18',
            ),
            'contactNo' => 'required|string|phone:MY|unique:profiles',
            'gender' => 'required',
            'address' => 'required|string|max:255',
            'state' => 'required',
            'postCode' => array(
                'required',
                'string',
                'Regex:/^[0-9]{5}$/'
            ),
            'profile_image' => 'image|nullable|max:1999',
            'agree' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
        $user = new User(array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => 'Customer',
            'activated' => true,
        ));

        if(isset($data['profile_image'])){
            $fileNameWithExt = $data['profile_image']->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $data['profile_image']->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $data['profile_image']->storeAs('public/profile_images/customers', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = new Profile(array(
            'name' => $data['name'],
            'nric' => $data['nric'],
            'contactNo' => $data['contactNo'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'state' => $data['state'],
            'postCode' => $data['postCode'],
            'profile_image' => $fileNameToStore,
        ));
        
                
        $user->save();
        $profile = $user->profile()->save($profile);

        Session::flash('register-success', 'User successfully created.');
        return $user;
    }
    
}
