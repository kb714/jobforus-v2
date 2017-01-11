<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class PayStatus extends Model
{

    protected $fillable = [
        'user_id', 'plan_id', 'order', 'status'
    ];

    public function plan()
    {
        return $this->belongsTo('JobForUs\Model\Plan');
    }

    public function user()
    {
        return $this->belongsTo('JobForUs\User');
    }

    public function getStatusParam()
    {
        switch($this->attributes['status']){
            case 4:
                return 'Aceptado';
            case 6:
                return 'Rechazado';
            default:
                return 'Pendiente';
        }
    }
}
