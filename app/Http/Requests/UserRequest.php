<?php

namespace Hoster\Http\Requests;

use Hoster\Http\Requests\Request;

class UserRequest extends Request
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
        $rules = [
            'name'          => 'required|string|min:2|max:50',
            'email'         => 'required|email|unique:users,email',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'phone'         => 'digits_between:7,11',
            'gender'        => 'required|boolean',
            'roles.*'       => 'required',
            'password'      => 'required|confirmed|min:6'
        ];

        $method = strtolower($this->method());
        if ($method == 'patch' || $method == 'put') {
            unset($rules['password']);
            $rules['email'] = 'required|email';
        }

        return $rules;
    }
}
