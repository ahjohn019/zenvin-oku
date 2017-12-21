<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Usertype extends Model
{
    
    
    protected $fillable = ['types','desc','name','email','phone_no'];

    
    public function scopeSearch($query, $s){
        return $query->where('name','like','%' .$s. '%');
    }
    
    public function admin(){
        return $this->belongsto(Admin::class);
    }
}
