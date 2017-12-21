<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['Name','Email','Talent','Service','Handicraft'];

    public function scopeSearch($query, $s){
    return $query->where('Name','like','%' .$s. '%');
    }

    public function admin(){
    return $this->belongsto(Admin::class);
    }

    /*public function organization(){
    return $this->belongsto(Organization::class);
    }*/

    public function organization(){
    return $this->belongsToMany('App\Organization');
    }
}
