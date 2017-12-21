<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Events extends Model
{
    use Sortable;
    protected $fillable = ['eventName','eventDesc','image','eventStartDate','eventEndDate','eventStartTime','eventEndTime','eventDuration','eventLocation','eventType','eventPrice','eventCouponPrice','eventCouponDesc','eventStatus', 'orgID'];//

    public $sortable = ['eventName', 'eventStartDate' ,'eventEndDate', 'eventStartTime', 'eventType', 'eventPrice' ,'created_at', 'updated_at'];

    public function scopeSearch($query, $s){
        return $query->where('eventName','like','%' .$s. '%');
    }

    public function admin(){
        return $this->belongsto(Admin::class);
    }

    public function organization(){
        return $this->belongsto('App\Organization','org_id');
    }

}
