<?php

namespace JobForUs\Model;

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
}
