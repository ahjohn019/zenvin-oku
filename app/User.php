<?php

namespace App;

use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'last_login_at', 'current_login_at', 'user_type', 'activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function profile(){
        return $this->hasOne('App\Profile');
    }
    
    public function org_profile(){
        return $this->hasOne('App\Org_profile');
    }
    
    public function private_profile(){
        return $this->hasOne('App\Private_profile');
    }

    public function membership(){
        return $this->hasOne('App\Membership');
    }
    
    public function isAdmin(){
        if($this->user_type=='Admin')
            return true;
        else
            return false;
    }

    public function isOrgActivated()
    {
        return $this->private_profile->org_profile->user->activated;
    }

    public function isExpired()
    {
        $today = Carbon::now();

        $dt = $this->membership->end_date;
        if (is_string($dt)) {
            $dt = Carbon::parse($dt,new DateTimeZone('Asia/Kuala_Lumpur'));
        }
        return $today->diffInDays($dt,false);
    }

    public function isOrgExpired()
    {
        $today = Carbon::now();
        
        $dt = $this->private_profile->org_profile->user->membership->end_date;
        if (is_string($dt)) {
            $dt = Carbon::parse($dt,new DateTimeZone('Asia/Kuala_Lumpur'));
        }
        return $today->diffInDays($dt,false);
    }

    public function isAccExpired()
    {
        $today = Carbon::now();
        
        $dt = $this->membership->end_date;
        if (is_string($dt)) {
            $dt = Carbon::parse($dt,new DateTimeZone('Asia/Kuala_Lumpur'));
        }

        return $today->diffInDays($dt);
    }
   
}
