<?php

namespace JobForUs\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserPostRequest extends FormRequest
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
            'name'                  => 'required|min:3|max:255',
            'username'              => 'required|min:3|max:255',
            'email'                 => 'required|min:3|max:255|email',
            'password'              => 'required|min:4|max:50',
            'password_confirmation' => 'same:password'
        ];
    }
}
