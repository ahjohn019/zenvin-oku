<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
  use Sortable;
    protected $fillable = ['productName','productDesc','productPrice','image','image','image','productQuantity','productQuantity','productCategory', 'productStatus','deliveryEM','deliveryWM', 'storeID'];

    public $sortable = ['productName','productPrice','productQuantity', 'created_at', 'updated_at'];

    public function scopeSearch($query, $s){
        return $query->where('productName','like','%' .$s. '%');
    }

    public function Store(){
    return $this->belongsto('App\Store', 'storeID');
    }

    public function PurchaseProduct(){
        return $this->belongsto(PurchaseProduct::class);
    }

    public function merchant(){
        return $this->belongsto(Merchant::class);
    }
}
