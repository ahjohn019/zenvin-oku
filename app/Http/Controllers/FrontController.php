<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Events;
use App\Service;
use App\Product;
use App\Organization;
use View;
use DB;
use Carbon\Carbon;
use App\Store;
use App\Org_Profile;
use App\Private_profile;
use App\User;
use App\CartItem;
Use Image;

class FrontController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(2);
        $events = Events::latest()->paginate(2);
        $products = DB::table('products')->get();
        $organizations = DB::table('organizations')->get();
        return view('front.marketmain')->with('events',$events)->with('products',$products)->with('organizations',$organizations)->with('services',$services);
    }
    
    public function master()
    {
        return view('master.marketmenu');
    }

    public function mastertest()
    {
        return view('master.marketmenutest');
    }

    public function mastertesttest()
    {
        return view('master.marketmenutest2');
    }


    public function storedetails($id)
    {
        $stores = Store::all()->where('id', '=',$id)->where('status','=','Active');
        $products = Product::all()->where('storeID', '=',  $id)->where('productStatus', '!=',  'DELETED');
        
        //Count all product
        $productCount = Product::where('storeID', '=',  $id)->count();
        //Count available product
        $productActive = Product::where('storeID','=',$id)->where('productStatus', '!=',  'DELETED')->count();
        //count available service
        $serviceActive = service::where('storeID','=',$id)->where('serviceStatus', '!=',  'DELETED')->count();

        $services = service::all()->where('storeID', '=',  $id)->where('serviceStatus', '!=',  'DELETED');
        $dt= Carbon::now();
        echo $dt->toDateString(); 
        return view('front.storedetails')->with('stores',$stores)->with('products',$products)->with('services',$services)->with(['productCount'=>$productCount,'productActive'=>$productActive,'serviceActive'=>$serviceActive]);
    }

    public function blackfriday(Request $request)
    {
        $stores=Store::all();
        $s = $request->input('s');
        $products= Product::sortable()
        ->where('productStatus','=','ACTIVE')
        ->search($s)
        ->paginate(12);
        return view('front.blackfriday',compact('products','s'))->with('stores',$stores);
    }

    public function handicraftfair(Request $request)
    {
        $stores=Store::all();
        $s = $request->input('s');
        $products= Product::sortable()
        ->where('productStatus','=','ACTIVE')
        ->search($s)
        ->paginate(12);
        return view('front.handicraftfair',compact('products','s'))->with('stores',$stores);
    }

    public function AboutUs()
    {
        return view('aboutus');
    }
     
}
