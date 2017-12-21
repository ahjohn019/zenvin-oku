<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Private_profile extends Model
{
    protected $table = 'private_profiles';
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'nric', 'nOku', 'contactNo', 'gender', 'address', 'state', 'postCode', 'profile_image', 'org_id', 'disability', 'certificate_doc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'nric', 'nOku', 'certificate_doc', 
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function org_profile(){
        return $this->belongsTo('App\Org_profile', 'org_id');
    }
}
