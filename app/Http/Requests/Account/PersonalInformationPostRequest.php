<?php

namespace JobForUs\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PersonalInformationPostRequest extends FormRequest
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
        if(Auth::user()->profile->user_type == 4)
            return [
                'name'                          => 'required|min:3|max:255',
                'identifier'                    => 'required|max:30',
                'last_name'                     => 'required|min:3|max:255',
                'job_type_id'                   => 'required|exists:job_types,id',
                'location_id'                   => 'required|exists:locations,id',
                'region_id'                     => 'required_if:location_id,1|exists:regions,id',
                'phone'                         => 'min:3|max:255|required_if:contact_preference_phone,1',
                'facebook'                      => 'min:3|max:255',
                'twitter'                       => 'min:3|max:255',
                'other'                         => 'min:3|max:255|required_if:contact_preference_other,1',
                'contact_preference_username'   => 'boolean|required_without_all:contact_preference_name,contact_preference_email,contact_preference_phone,contact_preference_other',
                'contact_preference_name'       => 'boolean|required_without_all:contact_preference_username,contact_preference_email,contact_preference_phone,contact_preference_other',
                'contact_preference_email'      => 'boolean|required_without_all:contact_preference_username,contact_preference_name,contact_preference_phone,contact_preference_other',
                'contact_preference_phone'      => 'boolean|required_without_all:contact_preference_username,contact_preference_name,contact_preference_email,contact_preference_other',
                'contact_preference_other'      => 'boolean|required_without_all:contact_preference_username,contact_preference_name,contact_preference_email,contact_preference_phone'
            ];
        else
            return [
                'name'                      => 'required|min:3|max:255',
                'identifier'                => 'required|max:30',
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
