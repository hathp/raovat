<?php


namespace System\Classified\Http\Requests;

use Hoster\Http\Requests\Request;
use System\Classified\Services\ClassifiedService;

class ClassifiedRequest extends Request
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
        $rules = ClassifiedService::getValidationRule(['method' => $this->method()]);

        return $rules;
    }
}