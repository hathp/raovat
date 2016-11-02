<?php


namespace System\Contact\Http\Requests;


use Hoster\Http\Requests\Request;
use System\Contact\Model\Contact;


class ContactRequest extends Request
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
            'email'         => 'required|email',
            'phone'         => 'digits_between:10,11'
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'email.email'  => 'Địa chỉ Email không hợp lệ',
            'phone.digits_between'  => 'Số điện thoại phải từ 10 đến 11 số',
        ];
    }
}