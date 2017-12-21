<?php

namespace App\Http\Controllers;

use App\Cart;
use forget;
use App\Handicraft;
use Illuminate\Http\Request;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Session;
use Validator;
use Input;
use Redirect;
use Auth;
use Image;

class HandicraftController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin',['except' => ['getHandicraft',
         'getAddToCart',
         'getReduceByOne',
         'getRemoveItem',
         'getCart']]);
                    
    }
    
    public function index(Request $request) //handicraft crud
    {
        /*$s = $request->input('s');
        $handicrafts = Handicraft::latest()
                ->search($s)
                ->paginate(4);
                
                return view('handicraft.index', compact('handicrafts','s'));*/
        $handicrafts = Handicraft::orderBy('id', 'title')->paginate(5);
        return view('handicraft.index')->withHandicrafts($handicrafts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
     public function createHand()
     {
         return view('handicraft.create');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @return Response
      */
   
     public function store(Request $request)
     {
         //validate
         $rules = array(
             'title' => 'required',
             'description' => 'required',
             'price' => 'required',
         );
        
         $validator = Validator::make(Input::all(),$rules);
         
         //process the login
         if ($validator -> fails()){
            return Redirect::to('handicraft/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            //store
            $handicrafts = new Handicraft;
            $handicrafts->title = Input::get('title');
            $handicrafts->description = Input::get('description');
            $handicrafts->price = Input::get('price');
            //authentication
            $handicrafts->admin_id = auth()->user()->id;
            //store image
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename); 
                Image::make($image)->resize(200,150)->save($location);
                $handicrafts->image = $filename;
            }
            $handicrafts -> save();
     
         

             // redirect
         Session::flash('message', 'Successfully created handicrafts');
         return Redirect::to('handicraft');
          
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
         // get the handicraft
        $handicrafts = Handicraft::find($id);
        
        // show the view and pass to it
        return view('handicraft.show', ['handicrafts'=> $handicrafts]);
     }
     
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function edit($id)
     {
         //get the handicraft
         $handicrafts = Handicraft::find($id);
         
         //show the edit form and pass the org to it
         return view('handicraft.edit', ['handicrafts'=> $handicrafts]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function update(Request $request,$id)
     {
         //validate
         $rules = array(
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        );

        $validator = Validator::make(Input::all(),$rules);
        //process the login
        if ($validator -> fails()){
           return Redirect::to('handicraft/create')
           ->withErrors($validator)
           ->withInput(Input::except('password'));
       }else {
            //store
            $handicrafts = Handicraft::find($id);
            $handicrafts->title = Input::get('title');
            $handicrafts->description = Input::get('description');
            $handicrafts->price = Input::get('price');
            //authentication
            $handicrafts->admin_id = auth()->user()->id;
            $handicrafts -> save();

            //store image
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename); 
                Image::make($image)->resize(200,150)->save($location);
                $handicrafts->image = $filename;
                $handicrafts->update(Input::all());
            }
           
             // redirect
         Session::flash('message', 'Successfully updated handicrafts');
         return Redirect::to('handicraft');
          
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
          // delete
        $handicrafts = Handicraft::find($id);
        $handicrafts->delete();

        // redirect
        Session::flash('message', 'Successfully deleted handicrafts');
        return Redirect::to('handicraft');
     }

   
     public function getHandicraft()
     {
         $handicrafts = Handicraft::all();
         return view('front.product', ['handicrafts'=> $handicrafts]);
     }

    public function getAddToCart(Request $request, $id)
    {
        $handicraft = Handicraft::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($handicraft, $handicraft->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('front.product');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

        
        return redirect()->route('front.shoppingCart');
    }
    
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('front.shoppingCart');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart',['handicrafts' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['handicrafts'=> $cart->items, 'totalPrice'=>$cart->totalPrice]);
    }
} //

