<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'plan_id'
    ];

    public function plan()
    {
        return $this->belongsTo('JobForUs\Model\Plan');
    }
}
