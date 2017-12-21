<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    public $fillable = ['RefNo','handicraftID','serviceID','purchaseQuantity'];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    
     public function purchasedHandicraft(){
        return $this->hasMany(Handicraft::class);
    }
    
    public function purchasedService(){
        return $this->hasMany(Service::class);
    }
}
