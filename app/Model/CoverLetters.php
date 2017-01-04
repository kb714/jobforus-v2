<?php

namespace JobForUs\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CoverLetters extends Model
{
    protected $fillable = [
      'job_type_id', 'name', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('JobForUs\User');
    }

    public function getStatusParam()
    {
        if($this->attributes['status'] == true)
            return 'Aprobado';
        else
            return 'No aprobado';
    }

    public function getCreatedAtParam()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->attributes['created_at'])->format('Y/m/d H:i:s');
    }
}
