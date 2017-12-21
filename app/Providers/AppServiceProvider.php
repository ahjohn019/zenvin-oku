<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Hash;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('nric_valid', function($attribute, $value, $parameters) {

            $year=substr($value, 0, 2);
            $month=substr($value, 2, 2);
            $day=substr($value, 4, 2);
            
            $dob=$day."-".$month."-19".$year;
            $d=DateTime::createFromFormat('d-m-Y', $dob);
            return ($d && $d->format('d-m-Y') === $dob);
        });

        Validator::extend('age_valid', function($attribute, $value, $parameters, $validator) {
            
            $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 18;
            $year=substr($value, 0, 2);
            $month=substr($value, 2, 2);
            $day=substr($value, 4, 2);
            
            if((int)$year>16){
                $dob=$day."-".$month."-19".$year;
            }else{
                $dob=$day."-".$month."-20".$year;
            }

            $d=DateTime::createFromFormat('d-m-Y', $dob);

            $validator->addReplacer('age_valid', function($message, $attribute, $rule, $parameters){
                return str_replace([':min'], $parameters, $message);
            });        
            $cd=new DateTime();
            return date_diff($d,$cd)->y >= $minAge;
        });

        Validator::extend('passcheck', function ($attribute, $value, $parameters) 
        {
            return Hash::check($value, Auth::user()->getAuthPassword());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
