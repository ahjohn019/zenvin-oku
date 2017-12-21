<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org_profile extends Model
{
    protected $table = 'org_profiles';
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'orgName', 'orgNo', 'contactNo', 'address', 'state', 'postCode', 'profile_image', 'contact_person' , 'certificate_doc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'certificate_doc', 'orgNo',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
        
    public function private_profile(){
        return $this->hasMany('App\Private_profile');
    }

    public function organization(){
        return $this->belongsTo('App\Organization','horg_id');
    }
}
