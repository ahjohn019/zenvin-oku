<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'memberships';
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'start_date','end_date','package_id', 'last_fee_pay_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Package', 'package_id');
    }
}
