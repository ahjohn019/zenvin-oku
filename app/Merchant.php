<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
        public $fillable = ['merchantCode','merchantKey','signature','requestURL','responseURL'];

     public function merchantProduct(){
        return $this->hasMany(Product::class);
    }
    
     public function Store(){
        return $this->hasOne(Store::class);
    }
}
