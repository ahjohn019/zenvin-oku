<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;
use App\Product;
use App\Service;
use App\Events;
use App\Store;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cartItem= cartItem::all()->where('userid', '=',  $id);
      $products = Product::all();
      $services = Service::all();
      $events = Events::all();
      return view('cartItem.show')->with('cartItems',$cartItem)->with('products',$products)->with('services',$services)->with('$events',$events)->with('userid',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cartItem $cartItem)
    {
      if($cartItem->itemType == 'Product'){
        $product = Product::find($cartItem->itemID);
        $store = Store::find($product->storeID);
        return view('cartItem.edit')->with('cartItem',$cartItem)->with('product',$product)->with('store',$store);
      }
      else if($cartItem->itemType == 'Service'){
        $service = Service::find($cartItem->itemID);
        $store = Store::find($service->storeID);
        return view('cartItem.edit')->with('cartItem',$cartItem)->with('service',$service)->with('store',$store);
      }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $cartItem)
    {
      if($cartItem->itemType =='Product'){
        $product = Product::find($cartItem->itemID);
        $this->validate($request, [
              'Quantity'=> 'integer | max:'.$product->productQuantity
          ]);
      }
        $cartItem->update($request->all());
        return redirect('cartItem/' . $cartItem->userid)->with('cartItemUpdated','Cart Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cartItem $cartItem)
    {
      $cartItem->delete();
      return redirect('cartItem/' . $cartItem->userid)->with('cartItemDeleted','Item Deleted');
    }

    public function checkOut($userID)
    {

      $cartItems= CartItem::all()->where('userid', '=',  $userID);
      $products = Product::all();
      foreach ($cartItems as $item){
        $product = Product::find($item->ProductID);
        if ($item->Quantity > $product->productQuantity) {
          return redirect('cartItem/' . $userID)->with('invalidQuantity','The product, ['.$product->productName.'] quantity may not be greater than '.$product->productQuantity);
        }
      }
      return view('front.payment')->with('cartItems',$cartItems)->with('products',$products);
    }
}
