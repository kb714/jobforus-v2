<?php

namespace JobForUs\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'plan_id', 'beginning_at', 'ends_at', 'notify_status'
    ];

    protected $dates = ['ends_at', 'beginning_at'];

    public function plan()
    {
        return $this->belongsTo('JobForUs\Model\Plan');
    }

    public function user()
    {
        return $this->belongsTo('JobForUs\User');
    }

    public function isValid()
    {
        if(!$this->attributes['ends_at']) return false;
        $now = Carbon::now();
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['ends_at']);
        if($now->lt($end))
            return true;
        return false;
    }

    public function getBeginningAtParam()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->attributes['beginning_at'])->format('Y/m/d H:i:s');
    }

    public function getEndsAtParam()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->attributes['ends_at'])->format('Y/m/d H:i:s');
    }
}
