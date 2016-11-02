<?php


namespace System\Product\Http\Requests;


use Hoster\Http\Requests\Request;

class ProductRequest extends Request
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
            'title'            => 'required|string|min:2|max:255',
            'brief'            => 'required|string|min:2|max:255',
            'slug'             => 'required|unique:products,slug',
            'cover_image'      => 'required|image',
            'product_category_id' => 'required|exists:product_categories,id',
            'publish'          => 'required|boolean',
            'published_at'     => 'date_format:d/m/Y H:i',
            'content'          => 'required|min:2',
            'meta_title'       => 'string',
            'meta_keyword'     => 'string',
            'meta_description' => 'string'
        ];
        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $rules['cover_image'] = 'image';
            $rules['slug'] = 'required|alpha_dash|min:2|max:255|unique:products,slug,'.$this->segment(3);
        }

        return $rules;
    }
}