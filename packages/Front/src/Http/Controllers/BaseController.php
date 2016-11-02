<?php
/**
 * User: Viet Trung
 * Date: 21/4/2016
 * Time: 4:25 PM
 */

namespace Front\Http\Controllers;


use Carbon\Carbon;
use Hoster\Http\Controllers\Controller;

class BaseController extends Controller
{
    const PACKAGE_NAME = 'front';

    public function __construct()
    {
        view()->share('package_name', self::PACKAGE_NAME);
        Carbon::setLocale('vi');
    }
}