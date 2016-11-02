<?php


namespace System\Product\Http\Requests;


use Hoster\Http\Requests\Request;

class ProductOptionRequest extends Request
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
            'name'                      => 'required|string|min:2|max:255',
            'product_category_id'       => 'required|integer',
            //'parent_id'                 => 'integer',
            'order'                     => 'integer'
        ];
        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $rules['cover_image'] = 'image';
            $rules['parent_id'] = '';
        }

        return $rules;
    }
}