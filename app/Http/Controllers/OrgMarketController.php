<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

use App\Store;
use App\Private_profile;

class OrgMarketController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('front.orgmarket',['organizations'=>$organizations]);
    }

    /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
      public function show($id)
      {
          //get the orgs
          $organizations = Organization::find($id); 
          $stores = Store::all()->where('orgID', '=',  $id)->where('status','=','Active');
          //add the count
          $storeCount = Store::where('orgID', '=',  $id)->count();
          //active store count
          $storeActive = Store::where('orgID', '=',  $id)->where('status','=','Active')->count();

          $privates = Private_profile::all();
          //random product
          $interested = Organization::where('id', '!=', $id)->get()->random(2);
          //show the view and pass the org to it
          return view('front.orgdetails')->with(['organizations'=> $organizations ,'interested'=>$interested,'storeCount'=>$storeCount,'storeActive'=>$storeActive])->with('stores',$stores)->with('privates',$privates);

      }
}
