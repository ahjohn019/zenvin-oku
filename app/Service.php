<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Service extends Model
{
  use Sortable;
    protected $fillable = ['serviceName','serviceDesc','serviceType','serviceTNC','serviceValidPeriod','serviceAvailableStart','serviceAvailableEnd','serviceInstruction','serviceLocation','servicePrice','serviceUnits','image','serviceStatus','storeID'];

    public $sortable = ['serviceName', 'serviceType' ,'servicePrice', 'created_at', 'updated_at'];

    public function scopeSearch($query, $s){
        return $query->where('serviceName','like','%' .$s. '%');
    }

    //public function scopeSearch($query, $s){
    //    return $query->where('name','like','%' .$s. '%');}

    public function admin(){
        return $this->belongsto(Admin::class);
    }
}
