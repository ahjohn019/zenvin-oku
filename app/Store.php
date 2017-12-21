<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $fillable = ['storeName','storeDesc','image','private_id','merchantID'];
  public function Product(){
      return $this->hasMany(Product::class);
  }

   public function Merchant(){
      return $this->belongsto(Merchant::class);
  }

  public function User(){
  return $this->belongsto('App\Private_profile','private_id');
  }
}
