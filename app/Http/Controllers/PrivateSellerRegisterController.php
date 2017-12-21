<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use App\Private_profile;
use App\Org_profile;
use App\Membership;
use Auth;

class PrivateSellerRegisterController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create(){
        $org_name_list = Org_profile::pluck('orgName', 'id')->toArray();
        $disability = array(
            1 => 'DE - Hearing',
            2 => 'BL - Sight',
            3 => 'SD - Speech',
            4 => 'PH - Physical',
            5 => 'LD - Learing difficulty',
            6 => 'ME - Mental',
            7 => 'MD - Various',
        );
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
        return view("auth.privateSellerRegister")->with('states', $states)->with('org_name_list',$org_name_list)->with('disability', $disability);
    }
    
    
    public function store(Request $data){
        
        $this->validate($data,['username' => array(
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
            'disability' => 'required_if:hasDisability,==,yes',
            'org_id' => 'required',
            'nric' => array(
                'required',
                'max:12',
                'unique:private_profiles',
                'Regex:/^[0-9][0-9][0-1][0-9][0-3][0-9]{7}$/',
                'nric_valid',
                'age_valid:18',
            ),
            'state' => 'required',
            'hasDisability' => 'required',
            'nOku' => array(
                'nullable',
                'required_if:hasDisability,==,yes',
                'max:14',
                'unique:private_profiles',
                'Regex:/^[A-Za-z][A-za-z][0-9]{12}$/',
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
            'profile_image' => 'required|image|max:1999',
            'certificate_doc_oku' => 'required|mimes:jpeg,jpg,png,bmp,webp|max:1999',
            'agree' => 'required',
        ]);

        $user = new User(array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => 'PrivateSeller',
        ));

        if(!is_null($data['certificate_doc_oku'])){
            $cerFileNameWithExt = $data['certificate_doc_oku']->getClientOriginalName();
            $cerFileName = pathinfo($cerFileNameWithExt, PATHINFO_FILENAME);
            $cerExtension = $data['certificate_doc_oku']->getClientOriginalExtension();
            $cerFileNameToStore = $cerFileName.'_'.time().'.'.$cerExtension;
            $path = $data['certificate_doc_oku']->storeAs('public/certificate_docs/private_seller', $cerFileNameToStore);
        }

        if(!is_null($data['profile_image'])){
            $fileNameWithExt = $data['profile_image']->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $data['profile_image']->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $data['profile_image']->storeAs('public/profile_images/private_seller', $fileNameToStore);
        }

        $org = Org_profile::find($data['org_id']);

        $profile = new Private_profile(array(
            'name' => $data['name'],
            'org_id' => $data['org_id'],
            'nric' => $data['nric'],
            'disability'=> $data['hasDisability'] == 'yes' ? $data['disability']:'Non-disabled',
            'certificate_doc' => $cerFileNameToStore,
            'nOku' => $data['nOku'],
            'contactNo' => $data['contactNo'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'state' => $data['state'],
            'postCode' => $data['postCode'],
            'profile_image' => $fileNameToStore,
        ));
        
        $user->save();
        $profile = $user->private_profile()->save($profile);
        
        $admin=User::where('user_type', '=', 'Admin')->get();
        foreach ($admin as $adm){
            
            $adm->notify(new \App\Notifications\noticeRegister($adm));
            
        }
        
        Auth::login($user);
        Session::flash('register-success', 'User successfully created.');
        return redirect('/');
    }
    

}
      
