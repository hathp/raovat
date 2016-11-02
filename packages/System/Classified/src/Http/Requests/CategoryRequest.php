<?php


namespace System\Classified\Http\Requests;


use Hoster\Http\Requests\Request;

class CategoryRequest extends Request
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
            'name' => 'required|string|min:1|max:255',
            'slug' => 'required|string|min:1|max:255|unique:classified_categories',
            'image' => 'image',
            'icon' => 'image'
        ];

        if( strtolower($this->method()) == 'put' || strtolower($this->method()) == 'patch' ) {
            $rules['slug'] = 'required|string|min:1|max:255';
        }

        return $rules;
    }
}