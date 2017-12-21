<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name','addr','desc','region','phone_no','reg_date','admin_id'];

    public function scopeSearch($query, $s){
        return $query->where('name','like','%' .$s. '%');
    }
    
    public function admin(){
        return $this->belongsto(Admin::class);
    }

    public function events(){
        return $this->hasMany(Events::class);
    }

    public function artist(){
        return $this->belongsToMany('App\Artist');
    }

    public function org_profile(){
        return $this->hasMany('App\Org_profile');
    }
}
