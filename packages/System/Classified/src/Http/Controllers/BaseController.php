<?php


namespace System\Classified\Http\Controllers;

use Hoster\Http\Controllers\Admin\AdminBaseController;

class BaseController extends AdminBaseController
{
    const PACKAGE_NAME = 'classified';

    public function __construct()
    {
        view()->share('package_name', self::PACKAGE_NAME);
    }
}