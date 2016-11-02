<?php


namespace System\Member\Http\Requests;


use Hoster\Http\Requests\Request;

class MemberRequest extends Request
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
            'email'             => 'required|unique:pages,slug',
            'phone'            => 'required|string|min:2|max:255',
            'cover_image'      => 'required|image',
            'member_group_id' => 'required|exists:member_groups,id',
            'meta_title'       => 'string',
            'meta_keyword'     => 'string',
            'meta_description' => 'string'
        ];

        $method = strtolower($this->method());
        if ($method == 'patch' || $method == 'put') {
            $rules['cover_image'] = 'image';
        }

        return $rules;
    }
}