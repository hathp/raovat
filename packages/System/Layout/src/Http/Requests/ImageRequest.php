<?php


namespace System\Contact\Http\Requests;


use Hoster\Http\Requests\Request;


class ImageRequest extends Request
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
            'name'          => 'required',
            'link'          => 'required'
        ];
        return $rules;
    }
}