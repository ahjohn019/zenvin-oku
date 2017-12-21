<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Org_profile;
use App\Membership;
use App\Organization;
use Auth;
    
class OrgSellerRegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create(){
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
        
        $organizations = Organization::all(); //get all the org db from org table
        return view("auth.orgSellerRegister")->with('states', $states)->with('organizations',$organizations);
    }
    
   
    public function store(Request $request){
       //dd($request['horg_id']); //the db can show into the break page, perhaps i need highlight the orgName?
        $this->validate($request, ['username' => array(
                'required',
                'string',
                'min:6',
                'unique:users',
                'Regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/'
            ),
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'orgName' => array(
                'required',
                'string',
                'max:255',
            ),
            'contact_person' => array(
                'required',
                'string',
                'max:255',
                'Regex:/^[a-zA-Z]+(([\'\,\.\ \-][a-zA-Z ])?[a-zA-Z]*)*$/'
            ),
            'orgNo' => array(
                'required',
                'max:12',
                'unique:org_profiles',
                'Regex:/^[0-9][0-9][0-9][0-9][0-9]+[A-Za-z]$/',
            ),
            'contactNo' => 'required|string|phone:MY|unique:org_profiles',
            'address' => 'required|string|max:255',
            'state' => 'required',
            'postCode' => array(
                'required',
                'string',
                'Regex:/^[0-9]{5}$/'
            ),
            'profile_image' => 'required|image|max:1999',
            'certificate_doc_org' => 'required|mimes:jpeg,jpg,png,bmp,webp|max:1999',
            'agree' => 'required',
                
            ]);
         
        $user = new User(array(
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'user_type' => 'OrgSeller',
        ));

        if(!is_null($request['certificate_doc_org'])){
            $cerFileNameWithExt = $request['certificate_doc_org']->getClientOriginalName();
            $cerFileName = pathinfo($cerFileNameWithExt, PATHINFO_FILENAME);
            $cerExtension = $request['certificate_doc_org']->getClientOriginalExtension();
            $cerFileNameToStore = $cerFileName.'_'.time().'.'.$cerExtension;
            $path = $request['certificate_doc_org']->storeAs('public/certificate_docs/org_seller', $cerFileNameToStore);
        }

        if(!is_null($request['profile_image'])){
            $fileNameWithExt = $request['profile_image']->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request['profile_image']->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request['profile_image']->storeAs('public/profile_images/org_seller', $fileNameToStore);
        }


        $profile = new Org_profile(array(
            'orgName' =>$request['orgName'],
            'orgNo' => $request['orgNo'],
            'contact_person' => $request['contact_person'],
            'contactNo' => $request['contactNo'],
            'address' => $request['address'],
            'state' => $request['state'],
            'postCode' => $request['postCode'],
            'profile_image' => $fileNameToStore,
            'certificate_doc' => $cerFileNameToStore,
            
        ));
        
     
   

        // $user->save();
        
        // $profile = $user->org_profile()->save($profile);
        
        // $admin=User::where('user_type', '=', 'Admin')->get();
        // foreach ($admin as $adm){
            
        //      $adm->notify(new \App\Notifications\noticeRegister($adm));
            
        // }
        

        Session::put('user', $user);
        Session::put('profile', $profile);//temporary hold data, doesnt store data into db
        
       // $profile->organization()->sync($request->organizations, false);// where should i put this? 
        return redirect('/orgSellerRegister/package_select');
    }      
    
}
