<?php

namespace JobForUs\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class SecurityPostRequest extends FormRequest
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
            'current_password' => 'required|min:6|max:30',
            'password' => 'min:6|max:30',
            'password_confirmation' => 'same:password',
            'email' => 'min:5|max:255|email|unique:users'
        ];
    }
}
