<?php
/**
 * User: Viet Trung
 * Date: 21/4/2016
 * Time: 4:25 PM
 */

namespace Front\Http\Controllers;

use System\Classified\Model\Classified;

class HomeController extends BaseController
{
    public function index()
    {
        $show_classifieds_numbers = 9;
        $all_classifieds = Classified::newest()->take($show_classifieds_numbers)->get();
        $hot_day_classifieds = Classified::today()->maxView()->take($show_classifieds_numbers)->get();
        $hot_week_classifieds = Classified::week()->maxView()->take($show_classifieds_numbers)->get();

        $data = [
            'all_classifieds'   => $all_classifieds,
            'hot_day_classifieds' => $hot_day_classifieds,
            'hot_week_classifieds' => $hot_week_classifieds
        ];

        return view(self::PACKAGE_NAME . '::page.index', $data);
    }

    public function createClassified()
    {

    }
}