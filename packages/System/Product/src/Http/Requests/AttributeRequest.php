<?php

namespace System\Product\Http\Requests;


use Hoster\Http\Requests\Request;

class AttributeRequest extends Request
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
            'name'            => 'required|string|min:2|max:255',
//            'product_category_id' => 'required|exists:product_categories,id',
//            'active'          => 'required|boolean',

        ];


        return $rules;
    }
}