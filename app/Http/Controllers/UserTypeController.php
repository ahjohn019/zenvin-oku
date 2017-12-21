<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\UserType;
use Session;
use DB;
use Auth;

class UserTypeController extends Controller
{
    public function __construct()
    {
         $this->middleware('admin');        
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        
                $usertypes = Usertype::latest()
                ->search($s)
                ->paginate(4);
                
                return view('usertype.index', compact('usertypes','s')); //

    }    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //validate
        $rules = array(
            'types' => 'required',
            'desc' => 'required',
            'name' => 'required|max:30',
            'email' => 'email | required | unique:users',
            'phone_no' => 'required',
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('usertype/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $usertypes = new Usertype;
            $usertypes->types = Input::get('types');
            $usertypes->desc = Input::get('desc');
            $usertypes->name = Input::get('name');
            $usertypes->email = Input::get('email');
            $usertypes->phone_no = Input::get('phone_no');
            //authentication
            $usertypes->admin_id = auth()->user()->id;
            $usertypes->save();
            
             // redirect
         Session::flash('message', 'Successfully created usertypes');
         return Redirect::to('usertype');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       
        $usertypes = Usertype::find($id);
        
        return view('usertype.show', ['usertypes'=> $usertypes]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $usertypes = Usertype::find($id);
        return view('usertype.edit', ['usertypes'=> $usertypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //validate
        $rules = array(
            'types' => 'required',
            'desc' => 'required',
            'name' => 'required|max:30',
            'email' => 'email | required | unique:users',
            'phone_no' => 'required',
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('usertype/edit'.$id)
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $usertypes = Usertype::find($id);
            $usertypes->types = Input::get('types');
            $usertypes->desc = Input::get('desc');
            $usertypes->name = Input::get('name');
            $usertypes->email = Input::get('email');
            $usertypes->phone_no = Input::get('phone_no');
            //authentication
            $usertypes->admin_id = auth()->user()->id;
            $usertypes->save();
            
             // redirect
         Session::flash('message', 'Successfully updated usertypes');
         return Redirect::to('usertype');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //delete
        $usertypes = Usertype::find($id);
        $usertypes->delete();
        // redirect
        Session::flash('message', 'Successfully deleted usertypes');
        return Redirect::to('usertype');
    }

}
