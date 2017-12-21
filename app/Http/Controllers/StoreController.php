<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\Service;
use App\Event;
use App\Private_profile;
use App\Package;
use App\Org_profile;
use App\Membership;

use App\User;
use App\Http\Controllers\ProductController;
Use Image;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores= Store::all();
      return view('stores.index')->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('stores.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'storeName'=> 'required | unique:stores,storeName',
            'storeDesc'=> 'required',
            'private_id' => 'required'
        ]);
        //Create New Store
        //Store::create($request->all());
        $storeid = Store::all()->max('id') +1;
        $store = new Store;
        $store->storeName = $request->input('storeName');
        $store->storeDesc = $request->input('storeDesc');
        $store->private_id = $request->input('private_id');
        if($request->hasFile('storeImage')){
          $filename = 'store_'.$storeid.'.'.$request->file('storeImage')->getClientOriginalExtension();
          $location = public_path('/image/stores/' . $filename);
          Image::make($request->file('storeImage'))->save($location);
          $store->image = $filename;
        }
        $store->orgID = $request->input('orgID');
        $org = Org_profile::find($request->input('orgID'));
        $user = User::all()->where('id','=',$org->user_id)->first();
        //Save Store
        $store->save();

        //Redirect
        return redirect('org_profiles/'.$user->username)->with('storeAdded','New Store, '.$request->input('storeName').' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
      $private = Private_profile::find($store->private_id);
      $products = product::all()->where('storeID', '=',  $store->id)->where('productStatus', '!=',  'DELETED');
      $services = service::all()->where('storeID', '=',  $store->id)->where('serviceStatus', '!=',  'DELETED');
      $org = Org_profile::find($store->orgID);
      //$services = service::all()->where('storeID', '=',  $storeID);
      //$events = event::all()->where('storeID', '=',  $storeID);
      return view('stores.show')->with('store',$store)->with('products',$products)->with('organization',$org)->with('private',$private)->with('services',$services);//->with('services',$services)->with('events',$events);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
      $privates = Private_profile::all();
      $owner = Private_profile::find($store->private_id);
      return view('stores.edit')->with('store',$store)->with('privates',$privates)->with('owner',$owner);
    }

    public function editSeller($storeID)
    {
      $store = Store::find($storeID);
      $privates = Private_profile::all();
      $owner = Private_profile::find($store->private_id);
      return view('stores.editSeller')->with('store',$store)->with('privates',$privates)->with('owner',$owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
      $this->validate($request, [
            'storeName'=> 'required',
            'storeDesc'=> 'required',
        ]);
        if($request->input('storeName') != $store->storeName){
          $this->validate($request, [
                'storeName'=> 'unique:stores,storeName',
            ]);
        }
      if($request->hasFile('storeImage')){
        if($store->image != 'store.png'){
          unlink(public_path('/image/stores/' . $store->image));
        }
        $filename = 'store_'.$store->id.'.'.$request->file('storeImage')->getClientOriginalExtension();
        $location = public_path('/image/stores/' . $filename);
        Image::make($request->file('storeImage'))->save($location);
        $store->image = $filename;
      }
      $store->update($request->all());
      return redirect('store/' . $store->id)->with('storeUpdated',$request->input('storeName').' Updated');
    }

    public function updateSeller(Request $request, $storeID)
    {
      $store = Store::find($storeID);
      $private = Private_profile::where('id',$store->private_id)->first();
      $user = User::find($private->user_id);
      $this->validate($request, [
            'storeName'=> 'required',
            'storeDesc'=> 'required',
        ]);
        if($request->input('storeName') != $store->storeName){
          $this->validate($request, [
                'storeName'=> 'unique:stores,storeName',
            ]);
        }
      if($request->hasFile('storeImage')){
        if($store->image != 'store.png'){
          unlink(public_path('/image/stores/' . $store->image));
        }
        $filename = 'store_'.$store->id.'.'.$request->file('storeImage')->getClientOriginalExtension();
        $location = public_path('/image/stores/' . $filename);
        Image::make($request->file('storeImage'))->save($location);
        $store->image = $filename;
      }
      $store->update($request->all());
      return redirect('private_profiles/' . $user->username)->with('storeUpdated',$request->input('storeName').' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
      $org = Org_profile::where('id',$store->orgID)->first();
      $user = User::find($org->user_id);
      $products=product::all()->where('storeID','=',$store->id);
      foreach ($products as $product) {
        ProductController::destroy($product);
      }
      $store->status = 'Deleted';
      $store->save();
      return redirect('org_profiles/'.$user->username)->with('storeDeleted',$store->storeName.' Deleted');
    }

    public function addNewProduct($storeid){
      $store = Store::find($storeid);
      $org = Org_profile::find($store->orgID);

      $private=Private_profile::find($store->private_id);
      $user = User::find($private->user_id);
      $member = Membership::where('user_id',$org->user_id)->first();
      $package = Package::find($member->package_id);
      $countProduct = Product::all()->where('storeID','=',$storeid)->where('productStatus','=','ACTIVE')->count();
      //
      $private = Private_profile::find($store->private_id);
      $products = product::all()->where('storeID', '=',  $store->id)->where('productStatus', '!=',  'DELETED');
      $services = service::all()->where('storeID', '=',  $store->id)->where('serviceStatus', '!=',  'DELETED');
      //
      if($countProduct >= $package->no_product_per_store){
        return redirect('private_profiles/'.$user->username)->with('store',$store)->with('products',$products)->with('organization',$org)->with('private',$private)->with('services',$services)
        ->with('overProduct','You have reach the maximum number of products.Please upgrade your package to create more products.');
      }
      return view('products.create')->with('storeid',$storeid);
    }
    public function addNewService($storeid){
      return view('services.create')->with('storeid',$storeid);
    }
    public function addNewEvent($storeid){
      return view('events.create')->with('storeid',$storeid);
    }
}
