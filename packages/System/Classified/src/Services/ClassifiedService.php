<?php

namespace System\Classified\Services;

use Core\Text\Process;
use Core\Upload\V2\Upload;
use Front\Http\Requests\ClassifiedRequest;
use Illuminate\Http\Request;
use System\Classified\Model\Classified;

class ClassifiedService
{
    public static $upload;
    public static $image_config;

    public static function getValidationRule($options = null)
    {
        $rules = [
            'name'    => 'required|string|min:2|max:255',
            'price'   => 'numeric|min:1',
            'content' => 'required|string|min:2',
            'mobile'  => 'numeric',
            'email'   => 'email',
            'address' => 'required|string|min:2',
            'image'   => 'image',
        ];

        if(isset($options['captcha'])) {
            $rules['captcha'] = 'required|captcha';
        }

        $method = isset($options['method']) ? strtolower($options['method']) : 'post';
        if($method == 'put' || $method == 'patch') {
            $rules['image'] = 'image';
        }

        return $rules;
    }

    public static function create(Request $request)
    {
        $inputs = $request->all();
        $inputs['image'] = self::$upload->images($request->file('image'), self::$image_config);
        $inputs['code'] = date('ymdhis');
        $inputs['slug'] = Process::strToSlug($inputs['name']) . '-' . date('ymdhis');
        $inputs['publish'] = 1;
        $inputs['home'] = 1;

        if(\Auth::check()) {
            $inputs['user_id'] = \Auth::user()->id;
        }

        $classifieds = Classified::create($inputs);
        $classifieds->categories()->attach($inputs['classifieds_category_id']);

        return $classifieds;
    }

    public static function edit($request, $classifieds)
    {

        $inputs = $request->all();

        if($request->hasFile('image')) {
            $inputs['image'] = self::$upload->images($request->file('image'), self::$image_config);
        }

        $classifieds->update($inputs);
    }

    public static function destroy(Request $request, $classified_id = null)
    {
        if(empty($classified_id)) {
            $id = $request->input('id');
        }
        else {
            $id = $classified_id;
        }

        Classified::destroy($id);
    }

}

ClassifiedService::$upload = new Upload();
ClassifiedService::$image_config = config('classifieds-image.classifieds_image');