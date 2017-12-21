<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
   
    
    protected $fillable = ['name','desc'];


    public function scopeSearch($query, $s){
        return $query->where('name','like','%' .$s. '%');
    }

    public function admin(){
        return $this->belongsto(Admin::class);
    }
    
}
