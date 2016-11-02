<?php


namespace System\Product\Http\Requests;


use Hoster\Http\Requests\Request;
use System\Product\Model\ProductCategory;


class ProductCategoryRequest extends Request
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
            'name'              => 'required|string|min:2|max:255',
            'slug'              => 'required|alpha_dash|min:2|max:255|unique:product_categories,slug',
            'cover_image'       => 'image',
            'parent_id'         => 'required',
            'active'            => 'required|boolean',
            'description'       => 'string|min:2|max:255',
            'order'             => 'integer',
            'meta_title'        => 'string|min:2|max:255',
            'meta_keyword'      => 'string|min:2|max:255',
            'meta_description'  => 'string|min:2|max:255',
        ];
        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $rules['cover_image'] = 'image';
            $rules['parent_id'] = '';
            $rules['slug'] = 'required|alpha_dash|min:2|max:255|unique:product_categories,slug,'.$this->segment(3);
        }

        return $rules;
    }
}