<?php

namespace JobForUs\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

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
        return [
            'username'  => 'required|min:3|max:255|unique:users,username,'.$this->usuario,
            'email'     => 'required|email|min:3|max:255|unique:users,email,'.$this->usuario
        ];
    }
}
