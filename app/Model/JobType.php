<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public function getStatusParam()
    {
        if($this->attributes['status'] == false)
            return 'Deshabilitado';
        return 'Habilitado';
    }
}
