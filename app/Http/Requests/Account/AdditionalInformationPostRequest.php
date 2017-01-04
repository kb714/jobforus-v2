<?php

namespace JobForUs\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalInformationPostRequest extends FormRequest
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
        return [
            'employment_situation'  => 'min:5|max:255',
            'experience'            => 'min:5|max:255',
            'study_level'           => 'min:5|max:255',
            'study_title'           => 'min:5|max:255',
            'languages'             => 'min:5|max:255',
            'curricular_other'      => 'min:5|max:255'
        ];
    }
}
