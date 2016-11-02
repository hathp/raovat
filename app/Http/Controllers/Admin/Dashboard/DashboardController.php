<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 25/2/2016
 * Time: 11:39 AM
 */

namespace Hoster\Http\Controllers\Admin\Dashboard;


use Hoster\Http\Controllers\Admin\AdminBaseController;
use Hoster\Model\User\User;
use System\Contact\Model\Contact;
use System\Page\Model\PageCategory;


class DashboardController extends AdminBaseController
{
    public function index()
    {
        $about_category = PageCategory::findOrFail(28);
        $service_category = PageCategory::findOrFail(27);
        $article_category = PageCategory::findOrFail(26);

        $data = [
            'page_title'         => 'Dashboard',
            'total_about'        => count($about_category->childPages()),
            'total_service'      => count($service_category->childPages()),
            'total_article'      => count($article_category->childPages()),

            'total_user'         => count(User::all()),
            'total_contact'      => count(Contact::all())
        ];

        return view('admin.dashboard.index',$data);
    }
}