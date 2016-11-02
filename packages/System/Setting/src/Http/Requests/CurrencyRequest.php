<?php

namespace System\Setting\Http\Requests;


use Hoster\Http\Requests\Request;
use System\Setting\Model\Currency;


class CurrencyRequest extends Request
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
            'name'         => 'required|string|min:2|max:50',
            'code'         => 'required|string|min:2|max:50',
            'value'        => 'required|numeric|min:1',
            'decimal'      => 'required|numeric|min:1|max:6',
            
        ];
        return $rules;
    }

}