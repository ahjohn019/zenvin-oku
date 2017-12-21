<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;
use Auth;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('packages.show_package')->with('details', $packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.add_package');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'package_name' => array(
                'required',
                'string',
                'unique:packages',
                'Regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/'
            ),
            'no_of_store_own' => 'required|numeric',
            'no_of_product_per_store' => 'required|numeric',
            'price_per_year' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $package = new Package(array(
            'package_name' => $request['package_name'],
            'no_store_own' => $request['no_of_store_own'],
            'no_product_per_store' => $request['no_of_product_per_store'],
            'price_per_year' => $request['price_per_year'],
        ));

        $package->save();

        Session::flash('package-success', 'Package Added');
        $packages = Package::all();
        return view('packages.show_package')->with('details', $packages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function packageAction(Request $request){
        
        if (isset($_POST['add'])) {
                return view('packages.add_package');
         } 
        else if (isset($_POST['delete'])){
            Package::destroy($request['delete']);
            Session::flash('package-success', 'Package Deleted');
            $packages = Package::all();
            return view('packages.show_package')->with('details', $packages);
        }
        else if (isset($_POST['edit'])) {
            $package = Package::find($request['edit']);
            return view('packages.edit_package')->with('package', $package);
        }
        
    }
    
    
    
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        
        $this->validate($request, [
            'package_name' => array(
                'required',
                'string',
                'unique:packages,id,'.$package->id,
                'Regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/',
            ),
            'no_store_own' => 'required|numeric',
            'no_product_per_store' => 'required|numeric',
            'price_per_year' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ]);
        $package->package_name = $request->input('package_name');
        $package->no_store_own = $request->input('no_store_own');
        $package->no_product_per_store = $request->input('no_product_per_store');
        $package->price_per_year = $request->input('price_per_year');
        $package->save();

        Session::flash('package-success', 'Package editted');
        $packages = Package::all();
        return view('packages.show_package')->with('details',$packages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
