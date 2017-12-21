<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Image;
use Session;
use App\Artist;
use Auth;
use App\Organization;

class ArtistController extends Controller
{
    public function __construct()
    {
         $this->middleware('admin');        
    }

    public function index(){
        $artists = Artist::all();
        return view('front.artist',['artists'=>$artists]);
    }
    public function getArtist(Request $request)
    {
        $s = $request->input('s');

        $artists = Artist::latest()
        ->search($s)
        ->paginate(8);
        
        return view('artist.index', compact('artists','s')); 
        /*$artists = Artist::orderBy('id', 'Name')->paginate(5);
        return view('artist.index')->withArtists($artists);*/
    }

    public function createArtist()
    {
        
         return view('artist.create'); //Bring Organizations database in to artist database
    }

    public function store(Request $request)
    {
         //validate
         $rules = array(
             'Name' => 'required|max:30',
             'Email' => 'required',
             'Talent' => 'required',
             'Service' => 'required',
             'Handicraft' => 'required',
             
             
         );
         $validator = Validator::make(Input::all(),$rules);

         //process the login
         if ($validator -> fails()){
             return Redirect::to('artist/create')
             ->withErrors($validator)
             ->withInput(Input::except('password'));
         } else {
           // store
           $artists = new Artist($request->all());
           $artists->Name = Input::get('Name');
           $artists->Email = Input::get('Email');
           $artists->Talent = Input::get('Talent');
           $artists->Service = Input::get('Service');
           $artists->Handicraft = Input::get('Handicraft');
          
           //authentication
           $artists->admin_id = auth()->user()->id;
           //store image
           if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename); 
                Image::make($image)->resize(200,150)->save($location);
                $artists->image=$filename;
           }
           $artists->save();

         // redirect
         Session::flash('message', 'Artist has been created successfully');
         return Redirect::to('artist');
         }
    }

    public function show($id)
    {
         // get the handicraft
        $artists = Artist::find($id);
        $organizations = Organization::all();
        // show the view and pass to it
        return view('artist.show', ['artists'=> $artists]);
    }

    public function show1($id)
    {
         // get the handicraft
        $artists = Artist::find($id);
        $organizations = Organization::all();
        //random
        $interested = Artist::where('id', '!=', $id)->get()->random(2);
        // show the view and pass to it
        return view('front.artistdetails')->with(['artists'=> $artists , 'interested'=>$interested]);

         
          
    }

    public function edit($id)
    {
        $artists = Artist::find($id);
        $organizations = Organization::all();
        $orgs = array();
        foreach ($organizations as $org) {
            $orgs[$org->id] = $org->name;
        }
        return view('artist.edit')->withArtists($artists)->withOrganizations($orgs);
    }

    public function update(Request $request,$id)
    {
         //validate
        $rules = array(
             'Name' => 'required|max:30',
             'Talent' => 'required',
             'Service' => 'required',
             'Handicraft' => 'required',
           
             
        );
         $validator = Validator::make(Input::all(),$rules);

        //process the login
        if ($validator -> fails()){
           return Redirect::to('artist/edit/'.$id)
           ->withErrors($validator)
           ->withInput(Input::except('password'));
       }else {
            //store
            $artists = Artist::find($id);
            $artists->Name = Input::get('Name');
            $artists->Email = Input::get('Email');
            $artists->Talent = Input::get('Talent');
            $artists->Service = Input::get('Service');
            $artists->Handicraft = Input::get('Handicraft');
           
            //authentication
            $artists->admin_id = auth()->user()->id;
            $artists ->save();

            //store image
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename); 
                Image::make($image)->resize(200,150)->save($location);
                $artists->image = $filename;
                $artists->update(Input::all());
            }
           
             // redirect
         Session::flash('message', 'Artist has been successfully updated');
         return Redirect::to('artist');
          
        }
    }
 
    public function destroy($id)
    {
         // delete
        $artists = Artist::find($id);
        $artists->delete();

        // redirect
        Session::flash('message', 'Artist has been successfully deleted');
        return Redirect::to('artist');
    }
}
