<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_type', 'name', 'last_name', 'identifier', 'phone',
        'facebook', 'twitter', 'other', 'job_type_id', 'location_id', 'region_id',
        // company special field
        'commercial_business', 'industry', 'address', 'company_contact_name',
        'company_contact_position', 'company_contact_email', 'company_contact_phone'
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
