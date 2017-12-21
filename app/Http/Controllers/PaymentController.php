<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PurchaseProduct;
use App\Payment;
use App\Handicraft;
use App\Merchant;
use App\Cart;
use App\CartItem;
use App\Product;
use App\Purchase;
use App\Store;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;
use Session;
use Auth;


class PaymentController extends Controller
{
    public function getPayment(){
        return view('payment.show');
    }
    
    public function getPaymentResponse(){
        return view('front.fakepaymentresponse');
    }
    
    public function show($id)
    { 
      //display cart items in payment page  
      $cartItem= cartItem::all()->where('userid', '=',  $id);
      $products = Product::all();
                
      return view('payment.show')->with('cartItems',$cartItem)->with('products',$products)
          ->with('userid',$id);
    }
    
    public function getPaymentDetails(Request $request)
    {
        $total = $request->input('total');
        $quantity = $request->input('quantity');

        //generate purchase data (RefNo) in database when click submit button
        $oldCartDetails = Session::get('cartItem');
        $newCartDetails = new Cart($oldCartDetails);
        $generatePurchase = DB::table('purchase')->insertGetId(array(
                                            'userID'=> Auth::check() ? Auth::user()->id : 'Account', //insert current user ID
                                            'purchaseDate'=> Carbon::now(),                          //insert current date
                                            'purchaseAmount'=> $total                                //insert cart total amount
                                            ));
        //get RefNo
        $purchase = DB::table('purchase')->max('RefNo');
        
        //get productID
        $product = DB::table('cart_items')->value('itemID');

 
        //generate purchasedproduct on database when click submit button
        /*$generatePuchasedProduct = DB::table('purchaseproduct')->insert([
                                            ['RefNo'=> $purchase, 'productID'=> $product, 'purchaseQuantity'=> $quantity]  
                                            ]);*/
       
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('cart_items', 'products.id', '=', 'cart_items.itemID')->get();
        
        //get store details that the user purchased from
        $stores = DB::table('stores')->join('products', 'stores.id', '=', 'products.storeID')
                                     ->join('cart_items', 'products.id', '=', 'cart_items.itemID')->get();
        
        //get organization details that the user purchased from
        $organization = DB::table('organizations')->join('stores', 'organizations.id', '=', 'stores.orgID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('cart_items', 'products.id', '=', 'cart_items.itemID')->get();
        
        //generate payment data in database when click submit button
        $generatePayment = DB::table('payment')->insertGetId(array(
                                            'paymentDate'=> Carbon::now(),          //insert current date
                                            'RefNo'=> $purchase,                    //insert RefNo
                                            'amount'=> $total,                       //insert amount
                                            'currency'=> "MYR"                      //insert currency
                                            ));
        
        //get payment ID
        $payment = DB::table('payment')->get();
        
        return view('front.fakepaymentresponse', ['merchant' => $merchant, 'payment' => $payment, 'purchase'=> $purchase, 'stores' => $stores, 'organization' => $organization]);
    }
    
     /*public function getUserInput(Request $request)
    {   
        //get user input
        $input = Input::get();
        
        $name = $input['name'];
        $email = $input['email'];
        $phone = $input['phone'];
        
        $productName = $input['productName'];
        $productPrice = $input['productPrice'];
        $quantity = $input['quantity'];
        
        foreach($productName as $productNames){
            Batch::create(['product_name' => $productNames]);
        }
        
        $total = $input['total'];
        
        return view('front.fakepaymentresponse')->with('name',$name)->with('email', $email)->with('phone', $phone)->with(['product_name' => $productNames])->with('productPrice', $productPrice)->with('quantity', $quantity)->with('total', $total);  
    }*/
    
    /*public function responsePage(Request $request){
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        //for response.php    
        return view('/payment.response', ['merchant' => $merchant, 'payment' => $payment]);
        }

        

    public function Ipay88Page(Request $request){
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        //for Ipay88.class.php   
        return view('/payment.Ipay88', ['merchant' => $merchant, 'payment' => $payment]);
        }
    
    
    public function requeryPage(Request $request){
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        //get RefNo
        $purchase = DB::table('purchase')->max('RefNo');
         
        //get total amount
        $total = $request->input('total');
            
        return view('/payment.requery', ['merchant' => $merchant, 'purchase' => $purchase, 'total' => $total]);
        }*/
}