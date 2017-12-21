<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Store;
use App\Events;
use App\Service;
use App\Org_profile;
use App\private_profile;
use App\User;
use App\CartItem;
Use Image;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $org=Org_profile::all();
      $s = $request->input('s');
      $events= events::sortable()
      ->search($s)
      ->paginate(12);
      return view('events.index',compact('events','s'))->with('orgs',$org);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(private_profile $id)
    {
        //$storeID = $id->orgID;
        return view('events.create')->with('orgID',$id->orgID);
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
          'eventName'=> 'required',
          'eventDesc'=> 'required',
          'eventImage'=> 'required',
          'eventStartDate'=> 'required',
          'eventEndDate'=> 'required',
          'eventStartTime'=> 'required',
          'eventEndTime'=> 'required',
          'eventLocation'=> 'required',
          'eventType'=>'required',
          'eventPrice'=> 'required|numeric',
          'orgID'=>'required'
      ]);

      //Create New event
      $event = new events;
      $event->eventName = $request->input('eventName');
      $event->eventDesc = $request->input('eventDesc');
      if($request->hasFile('eventImage')){
        $filename = $request->input('eventName').'1'.'_'.time().'-'.'.'.$request->file('eventImage')->getClientOriginalExtension();
        $location = public_path('/image/events/' . $filename);
        Image::make($request->file('eventImage'))->save($location);
        $event->eventImage = $filename;
      }
      $event->eventStartDate = $request->input('eventStartDate');
      $event->eventEndDate = $request->input('eventEndDate');
      $event->eventStartTime = $request->input('eventStartTime');
      $event->eventEndTime = $request->input('eventEndTime');
      $event->eventLocation = $request->input('eventLocation');
      $event->eventType = $request->input('eventType');
      $event->eventPrice = $request->input('eventPrice');
      $event->eventCouponPrice = $request->input('eventCouponPrice');
      $event->eventCouponDesc = $request->input('eventCouponDesc');
      $event->eventPrice = $request->input('eventPrice');
      $event->eventStatus = "DEACTIVE";
      $event->orgID = $request->input('orgID');
      //Save Store

      $org = Org_profile::find($request->input('orgID'));
      $user = User::all()->where('id','=',$org->user_id)->first();
      $event->save();


      //Redirect
      return redirect('org_profiles/'.$user->username)->with('eventAdded','New Event, '.$request->input('eventName').' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(events $event)
    {
      //$eventID = $event->id;
      //$events = event::all()->where('id', '=',  $eventID);
      $org=Org_profile::find($event->orgID);
      return view('events.show')->with('event',$event)->with('orgs',$org);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(events $event)
    {
        return view('events.edit')->with('event',$event);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, events $event)
    {

      if($request->hasFile('eventImage')){
        if($request->hasFile('eventImage')){
          if($event->eventImage != 'event.png'){
            unlink(public_path('/image/events/' . $event->eventImage));}}
        $filename = $request->input('eventName').'1'.'_'.time().'-'.'.'.$request->file('eventImage')->getClientOriginalExtension();
        $location = public_path('/image/events/' . $filename);
        Image::make($request->file('eventImage'))->save($location);
        $event->eventImage = $filename;
      }


      $org = Org_profile::find($request->input('orgID'));
      $user = User::all()->where('id','=',$org->user_id)->first();
      $event->update($request->all());
      //Redirect
      return redirect('org_profiles/'.$user->username)->with('eventUpdated','event Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy(events $event)
    {
      $org = Org_profile::where('id',$event->orgID)->first();
      $user = User::find($org->user_id);
      $event->eventStatus = 'DELETED';
      $event->save();
      return redirect('org_profiles/'.$user->username)->with('eventDeleted',$event->eventName.' Deleted!');
            }

    public function addToCart(Request $request, $id){
      $event = event::find($id);
      $this->validate($request, [
            'Quantity'=> 'integer | max:'.$event->eventQuantity
        ]);
      $count = CartItem::where('userid','=',$request->input('userid'))->where('eventID','=',$event->id)->count();
      if($count){
        return Redirect('event/'.$event->id)->with('itemExist','Item already exist in cart.');
      }
      $item = new CartItem;
      $item->userid = $request->input('userid');
      $item->eventID = $event->id;
      $item->Quantity = $request->input('Quantity');
      $item->DeliveryMethod = $request->input('DeliveryMethod');
      $item->DeliveryCharges = 0;
      $item->save();
      return redirect()->route('event.index');
    }

}
