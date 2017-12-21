<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function organization(){
        return $this->hasMany(Organization::class);
    }
   
    public function events(){
        return $this->hasMany(Events::class);
    }

    public function handicrafts(){
        return $this->hasMany(Handicraft::class);
    }

    public function feedback(){
        return $this->hasMany(Feedback::class);
    }
   
    public function service(){
        return $this->hasMany(Service::class);
    }

    public function usertypes(){
        return $this->hasMany(Usertype::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
