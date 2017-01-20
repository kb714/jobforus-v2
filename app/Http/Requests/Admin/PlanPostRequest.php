<?php

namespace JobForUs\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PlanPostRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'user_type_id' => 'required|in:4,6',
            'description' => 'max:2000',
            'highlight' => 'required|boolean'
        ];
    }
}
