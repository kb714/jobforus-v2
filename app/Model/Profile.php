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
        'company_contact_position', 'company_contact_email', 'company_contact_phone',
        // curricular others (person)
        'employment_situation', 'experience', 'study_level', 'study_title', 'languages', 'curricular_other'
    ];

    /**
     * JobTye relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobType()
    {
        return $this->hasOne('JobForUs\Model\JobType', 'id', 'job_type_id');
    }

    public function location()
    {
        return $this->hasOne('JobForUs\Model\Location', 'id', 'location_id');
    }

    public function region()
    {
        return $this->hasOne('JobForUs\Model\Region', 'id', 'region_id');
    }

    /**
     * Format user Type param
     * @return string
     */
    public function getUserTypeParam()
    {
        if($this->attributes['user_type'] == 4){
            return 'Persona';
        }else{
            return 'Empresa';
        }
    }
}
