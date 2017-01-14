<?php

namespace JobForUs\Model;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    protected $fillable = [
        'name', 'price', 'user_type_id', 'quantity', 'highlight', 'description'
    ];

    public function getUserTypeParam()
    {
        if($this->attributes['user_type_id'] == 4)
            return 'Persona';
        return 'Empresa';
    }

}
