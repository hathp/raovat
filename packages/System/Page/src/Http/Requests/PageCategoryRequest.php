<?php

namespace System\Page\Http\Requests;


use Hoster\Http\Requests\Request;

class PageCategoryRequest extends Request
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
            'name'        => 'required|string|min:2|max:255',
            'slug'        => 'required|alpha_dash|min:2|max:255|unique:page_categories,slug',
            'parent_id'   => 'required|numeric|exists:page_categories,id',
            'active'      => 'required|boolean',
            'description' => 'string|min:2|max:255',
            'cover_image' => 'image',

            'meta_title'       => 'string|min:2|max:255',
            'meta_keyword'     => 'string|min:2|max:255',
            'meta_description' => 'string|min:2|max:255',
        ];

        $method = strtolower($this->method());
        if ($method == 'patch' || $method == 'put') {
            $rules['cover_image'] = 'image';
            $rules['slug'] = 'required|alpha_dash|min:2|max:255|unique:page_categories,slug,'.$this->segment(3);
        }

        return $rules;
    }
}