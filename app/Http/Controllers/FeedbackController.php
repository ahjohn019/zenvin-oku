<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Feedback;
use Session;


class FeedbackController extends Controller
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
        
                $feedback = Feedback::latest()
                ->search($s)
                ->paginate(4);
                
                return view('feedback.index', compact('feedback','s')); //

     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function createFeed()
     {
        return view('feedback.create');
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
            'name' => 'required|max:30',
            'desc' => 'required',
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('feedback/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $feedback = new Feedback;
            $feedback->name = Input::get('name');
            $feedback->desc = Input::get('desc');
            //authentication
           $feedback->admin_id = auth()->user()->id;
            $feedback->save();
            
             // redirect
         Session::flash('message', 'Successfully created feedback');
         return Redirect::to('feedback');
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
        $feedback = Feedback::find($id);
        return view('feedback.show', ['feedback'=> $feedback]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function edit($id)
     {
        $feedback = Feedback::find($id);
        return view('feedback.edit', ['feedback'=> $feedback]);
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
            'name' => 'required|max:30',
            'desc' => 'required',
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('feedback/edit'.$id)
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $feedback = Feedback::find($id);
            $feedback->name = Input::get('name');
            $feedback->desc = Input::get('desc');
             //authentication
           $feedback->admin_id = auth()->user()->id;
            $feedback->save();

             // redirect
         Session::flash('message', 'Successfully created feedback');
         return Redirect::to('feedback');
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
        $feedback = Feedback::find($id);
        $feedback->delete();
        // redirect
        Session::flash('message', 'Successfully deleted feedback');
        return Redirect::to('feedback');
     } 
}
