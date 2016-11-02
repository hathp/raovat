<?php


namespace System\Setting\Http\Controllers;

use Core\File\File;
use Core\Upload\V2\Upload;
use Hoster\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use System\Setting\Model\Setting;
use System\Setting\Model\SettingGroup;

class SettingController extends AdminBaseController
{
    protected $upload;
    protected $file;
    public function __construct(Upload $upload, File $file)
    {
        $this->upload = $upload;
        $this->file = $file;
    }
    public function index()
    {
//        dd(config('setting-image.value_image'));

        $setting_groups = SettingGroup::all();


        $data = [
            'page_title' => 'Thông số hệ thống',
            'setting_groups'   => $setting_groups
        ];

        return view('hoster-config::setting.index', $data);
    }

    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        Setting::where('id', $id)->update(['value' => $value]);

        return response(null, 200);
    }
    public function upload(Request $request)
    {
        // Upload cover image
          $setting = Setting::findOrfail(21);

          if(!empty($setting->value)){
                $setting->deleteCover();
          }

          $cover_image_path = $this->upload->images($request->file('file'), config('setting-image.value_image'));

          Setting::where('id', 21)->update(['value' => $cover_image_path]);

    }
}