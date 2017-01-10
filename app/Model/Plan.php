<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    public function getUserTypeParam()
    {
        if($this->attributes['user_type_id'] == 4)
            return 'Persona';
        return 'Empresa';
    }

}
