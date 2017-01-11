<?php

namespace JobForUs\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use JobForUs\User;

class UserPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = User::find($this->usuario);
        if($data->profile->user_type == 4)
            return [
                'username'              => 'required|min:3|max:255|unique:users,username,'.$data->id,
                'email'                 => 'required|email|min:3|max:255|unique:users,email,'.$data->id,
                'identifier'            => 'required|min:3|max:30|unique:profiles,identifier,'.$data->profile->id,
                'name'                  => 'required|min:3|max:255',
                'job_type_id'           => 'required|exists:job_types,id',
                'location_id'           => 'required|exists:locations,id',
                'region_id'             => 'required_if:location_id,1|exists:regions,id',
                'phone'                 => 'min:3|max:255',
                'facebook'              => 'min:3|max:255',
                'twitter'               => 'min:3|max:255',
                'other'                 => 'min:3|max:255',
                'employment_situation'  => 'min:5|max:255',
                'experience'            => 'min:5|max:255',
                'study_level'           => 'min:5|max:255',
                'study_title'           => 'min:5|max:255',
                'languages'             => 'min:5|max:255',
                'curricular_other'      => 'min:5|max:255'
            ];
        else
            return [
                'username'                  => 'required|min:3|max:255|unique:users,username,'.$data->id,
                'email'                     => 'required|email|min:3|max:255|unique:users,email,'.$data->id,
                'identifier'                => 'required|min:3|max:30|unique:profiles,identifier,'.$data->profile->id,
                'name'                      => 'required|min:3|max:255',
                'phone'                     => 'required|min:3|max:255',
                'commercial_business'       => 'required|min:3|max:255',
                'industry'                  => 'required|min:3|max:255',
                'address'                   => 'required|min:3|max:255',
                'company_contact_name'      => 'required|min:3|max:255',
                'company_contact_position'  => 'required|min:3|max:255',
                'company_contact_email'     => 'required|email|min:3|max:255',
                'company_contact_phone'     => 'required|min:3|max:255'
            ];
    }
}
