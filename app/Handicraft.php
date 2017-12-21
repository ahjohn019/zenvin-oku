<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handicraft extends Model
{
   protected $fillable = ['imagepath','title','description','price'];
    
   public function scopeSearch($query, $s){
    return $query->where('title','like','%' .$s. '%');
}
public function admin(){
    return $this->belongsto(Admin::class);
}

}
