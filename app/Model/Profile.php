<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'identifier', 'phone', 'facebook', 'twitter', 'other', 'job_type_id', 'location_id', 'region_id'
    ];

    /**
     * JobTye relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function job_type()
    {
        return $this->hasOne('JobForUs\Model\JobType');
    }

    /**
     * Format user Type param
     * @return string
     */
    public function getUserType()
    {
        if($this->attributes['user_type'] == 4){
            return 'Persona';
        }else{
            return 'Empresa';
        }
    }
}
