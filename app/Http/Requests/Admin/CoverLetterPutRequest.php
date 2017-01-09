<?php

namespace JobForUs\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CoverLetterPutRequest extends FormRequest
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
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'status' => 'required|boolean',
            'reason' => 'required_if:status,0|min:5|max:300'
        ];
    }
}
