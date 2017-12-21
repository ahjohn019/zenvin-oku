<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Store;
use App\Org_Profile;
use App\Private_profile;
use App\User;
use App\Product;
use App\CartItem;
Use Image;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductController extends Controller
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
      $products= Product::sortable()
      ->where('productStatus','=','ACTIVE')
      ->search($s)
      ->paginate(12);
      return view('products.index',compact('products','s'))->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $storeID = $store->id;
        return view('products.create')->with('storeid',$storeID);
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
          'productName'=> 'required',
          'productDesc'=> 'required',
          'productPrice'=> 'required|numeric',
          'productImage1'=>'required',
          'productQuantity'=>'required|numeric|max:999',
          'productWeight'=> 'required|numeric',
          'productPromo' => 'required|string',
          'deliveryEM'=> 'required|numeric',
          'deliveryWM'=> 'required|numeric',
          'productCategory'=>'required',
          'storeID'=>'required'
      ]);

      //Create New product
      $product = new product;
      $product->productName = $request->input('productName');
      $product->productDesc = $request->input('productDesc');
      $product->productPrice = $request->input('productPrice');
      if($request->hasFile('productImage1')){
        $filename = $request->input('productName').'1'.'_'.time().'-'.'.'.$request->file('productImage1')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage1'))->save($location);
        $product->productImage1 = $filename;
      }
      if($request->hasFile('productImage2')){
        $filename = $request->input('productName').'2'.'_'.time().'-'.'.'.$request->file('productImage2')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage2'))->save($location);
        $product->productImage2 = $filename;
      }
      if($request->hasFile('productImage3')){
        $filename = $request->input('productName').'3'.'_'.time().'-'.'.'.$request->file('productImage3')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage3'))->save($location);
        $product->productImage3 = $filename;
      }
      $product->productQuantity = $request->input('productQuantity');
      $product->productWeight = $request->input('productWeight');
      $product->productPromo = $request->input('productPromo');
      $product->deliveryEM = $request->input('deliveryEM');
      $product->deliveryWM = $request->input('deliveryWM');
      $product->productCategory = $request->input('productCategory');
      $product->productStatus = "PENDING";
      $product->storeID = $request->input('storeID');
      //Save Store
      $product->save();

      $user = User::find($request->input('userid'));

      //Redirect
      return redirect('private_profiles/'.$user->username)->with('productAdded','New Product Added! (Wait for Organisation Approval)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      //$productID = $product->id;
      //$products = product::all()->where('id', '=',  $productID);
      $store = store::find($product->storeID );
      return view('products.show')->with('product',$product)->with('store',$store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product',$product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

      if($request->hasFile('productImage1')){
        if($request->hasFile('productImage1')){
          if($product->productImage1 != 'product.png'){
            unlink(public_path('/image/products/' . $product->productImage1));}}
        $filename = $request->input('productName').'1'.'_'.time().'-'.'.'.$request->file('productImage1')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage1'))->save($location);
        $product->productImage1 = $filename;
      }
      if($request->hasFile('productImage2')){
        if($request->hasFile('productImage2')){
          if($product->productImage2 != 'product.png'){
            unlink(public_path('/image/products/' . $product->productImage2));}}
        $filename = $request->input('productName').'2'.'_'.time().'-'.'.'.$request->file('productImage2')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage2'))->save($location);
        $product->productImage2 = $filename;
      }
      if($request->hasFile('productImage3')){
        if($request->hasFile('productImage3')){
          if($product->productImage3 != 'product.png'){
            unlink(public_path('/image/products/' . $product->productImage3));}}
        $filename = $request->input('productName').'3'.'_'.time().'-'.'.'.$request->file('productImage3')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage3'))->save($location);
        $product->productImage3 = $filename;
      }


      $product->update($request->all());

      $user = User::find($request->input('userid'));

      //Redirect
      return redirect('private_profiles/'.$user->username)->with('productUpdated','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy(Product $product)
    {
      $store = Store::find($product->storeID);
      $org = Org_profile::find($store->orgID);
      $private=Private_profile::find($store->private_id);
      $user = User::find($private->user_id);

        $product->productStatus = 'DELETED';

        $product->save();
        return redirect('private_profiles/'.$user->username)->with('productDeleted','Product has been removed!');

    }

    public function approveProduct($id)
        {
          $product= Product::find($id);
          $store = Store::find($product->storeID);
          $org = Org_profile::find($store->orgID);
          $user = User::find($org->user_id);
        $product->productStatus = 'ACTIVE';

        $product->save();
        return redirect('org_profiles/'.$user->username)->with('productApprove','SUCCESS: Product has been Approved!');

    }

    public function rejectProduct($id)
        {
          $product= Product::find($id);
          $store = Store::find($product->storeID);
          $org = Org_profile::find($store->orgID);
          $user = User::find($org->user_id);
        $product->productStatus = 'REJECTED';

        $product->save();
        return redirect('org_profiles/'.$user->username)->with('productReject','Product has been Rejected!');

    }

    public function addToCart(Request $request, $id){
      $product = product::find($id);
      $this->validate($request, [
            'Quantity'=> 'integer | max:'.$product->productQuantity
        ]);
      $count = CartItem::where('userid','=',$request->input('userid'))->where('itemID','=',$product->id)->where('itemType','=','Product')->count();
      if($count){
        return Redirect('product/'.$product->id)->with('productExist','Item already exist in cart. Do you want to edit the item?');
      }
      $item = new CartItem;
      $item->userid = $request->input('userid');
      $item->itemID = $product->id;
      $item->itemType = 'Product';
      $item->Quantity = $request->input('Quantity');
      $item->DeliveryMethod = $request->input('DeliveryMethod');
      $item->save();
      return redirect()->route('product.index');
    }

}
