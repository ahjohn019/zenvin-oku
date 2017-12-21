<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['Quantity', 'DeliveryMethod'];
    public function User(){
    return $this->belongsto('App\User', 'userid');
    }
}
