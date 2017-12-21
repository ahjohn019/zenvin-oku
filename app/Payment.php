<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = ['paymentDate','RefNo','amount','currency'];
    
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    
}
