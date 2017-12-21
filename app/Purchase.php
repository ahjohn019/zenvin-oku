<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $fillable = ['userID','purchaseDate','purchaseAmount'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function payment(){
        return $this->hasOne(Payment::class);
    }
    
    public function purchasedproduct(){
        return $this->hasMany(PurchaseProduct::class);
    }
}
