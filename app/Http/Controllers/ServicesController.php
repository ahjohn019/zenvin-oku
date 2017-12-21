<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Store;
use App\Service;
use App\CartItem;
use App\Org_Profile;
use App\Private_profile;
use App\User;
Use Image;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $stores=Store::all();
      $s = $request->input('s');
      $services= service::sortable()
      ->where('serviceStatus','=','ACTIVE')
      ->search($s)
      ->paginate(12);
      return view('services.index',compact('services','s'))->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $storeID = $store->id;
        return view('services.create')->with('storeid',$storeID);
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
          'serviceName'=> 'required',
          'serviceDesc'=> 'required',
          'serviceType'=>'required',
          'serviceTNC'=>'required',
          'serviceValidPeriod'=>'required',
          'serviceAvailableStart'=>'required',
          'serviceAvailableEnd'=>'required',
          'serviceInstruction'=>'required',
          'serviceLocation'=>'required',
          'servicePrice'=> 'required|numeric',
          'serviceImage'=> 'required',
          'serviceUnits'=>'required',
          'storeID'=>'required'
      ]);

      //Create New service
      $service = new service;
      $service->serviceName = $request->input('serviceName');
      $service->serviceDesc = $request->input('serviceDesc');
      $service->serviceType = $request->input('serviceType');
      $service->serviceTNC = $request->input('serviceTNC');
      $service->serviceValidPeriod = $request->input('serviceValidPeriod');
      $service->serviceAvailableStart = $request->input('serviceAvailableStart');
      $service->serviceAvailableEnd = $request->input('serviceAvailableEnd');
      $service->serviceInstruction = $request->input('serviceInstruction');
      $service->serviceLocation = $request->input('serviceLocation');
      $service->servicePrice = $request->input('servicePrice');
      $service->serviceUnits = $request->input('serviceUnits');
      if($request->hasFile('serviceImage')){
        $filename = $request->input('serviceName').'1'.'_'.time().'-'.'.'.$request->file('serviceImage')->getClientOriginalExtension();
        $location = public_path('/image/services/' . $filename);
        Image::make($request->file('serviceImage'))->save($location);
        $service->serviceImage = $filename;
      }
      $service->serviceStatus = "PENDING";
      $service->storeID = $request->input('storeID');
      //Save Store
      $service->save();
      $user = User::find($request->input('userid'));

      //Redirect
      return redirect('private_profiles/'.$user->username)->with('serviceAdded','New Service Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
      //$serviceID = $service->id;
      //$services = service::all()->where('id', '=',  $serviceID);
      $store = store::find($service->storeID);
      return view('services.show')->with('service',$service)->with('store',$store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        return view('services.edit')->with('service',$service);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {

      if($request->hasFile('serviceImage')){
        if($request->hasFile('serviceImage')){
          if($service->serviceImage != 'service.png'){
            unlink(public_path('/image/services/' . $service->serviceImage));}}
        $filename = $request->input('serviceName').'1'.'_'.time().'-'.'.'.$request->file('serviceImage')->getClientOriginalExtension();
        $location = public_path('/image/services/' . $filename);
        Image::make($request->file('serviceImage'))->save($location);
        $service->serviceImage = $filename;
      }
      $service->update($request->all());

      $user = User::find($request->input('userid'));

      //Redirect
      return redirect('private_profiles/'.$user->username)->with('serviceUpdated','Service Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy(service $service)
    {
      $store = Store::find($service->storeID);
      $org = Org_profile::find($store->orgID);
      $private=Private_profile::find($store->private_id);
      $user = User::find($private->user_id);
        $service->serviceStatus = 'DELETED';

        $service->save();
        return redirect('private_profiles/'.$user->username)->with('serviceDeleted','service has been removed!');
    }

    public function searchService(){
      $q = Input::get ( 'q' );

      if( empty($q))
      {$services= service::all();
      return view('services.index')->with('services',$services);}
      else
      {$services = service::where('serviceName','LIKE','%'.$q.'%')->get();}

      return view('services.index')->with('services',$services)->with('searchResult',$q);
    }

    public function approveservice($id)
        {
          $service= service::find($id);
          $store = Store::find($service->storeID);
          $org = Org_profile::find($store->orgID);
          $user = User::find($org->user_id);
        $service->serviceStatus = 'ACTIVE';

        $service->save();
        return redirect('org_profiles/'.$user->username)->with('serviceApprove','SUCCESS: Service has been Approved!');

    }

    public function rejectservice($id)
        {
          $service= service::find($id);
          $store = Store::find($service->storeID);
          $org = Org_profile::find($store->orgID);
          $user = User::find($org->user_id);
        $service->serviceStatus = 'REJECTED';

        $service->save();
        return redirect('org_profiles/'.$user->username)->with('serviceReject','Service has been Rejected!');

    }

    public function addToCart(Request $request, $id){
      $service = service::find($id);
      $this->validate($request, [
            'Quantity'=> 'integer'
        ]);
      $count = CartItem::where('userid','=',$request->input('userid'))->where('itemID','=',$service->id)->where('itemType','=','Service')->count();
      if($count){
        return Redirect('services/'.$service->id)->with('serviceExist','Service already exist in cart. Do you want to edit the item?');
      }
      $item = new CartItem;
      $item->userid = $request->input('userid');
      $item->itemID = $service->id;
      $item->itemType = 'Service';
      $item->Quantity = $request->input('Quantity');
      $item->DeliveryMethod = '';
      $item->save();
      return redirect()->route('services.index');
    }

}
