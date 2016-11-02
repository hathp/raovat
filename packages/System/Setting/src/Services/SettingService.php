<?php


namespace System\Setting\Services;


use System\Setting\Model\Setting;

class SettingService
{
    public function getValueBySlug($slug)
    {
        return Setting::getValueBySlug($slug);
    }
}