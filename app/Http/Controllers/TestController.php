<?php

namespace Hoster\Http\Controllers;

use Illuminate\Http\Request;
use Menu;

use Hoster\Http\Requests;
use Hoster\Http\Controllers\Controller;

class TestController extends Controller
{
    public function menu()
    {


        $menu = Menu::get('AdminSidebarLeft')->asUl(['class' => 'page-sidebar-menu page-header-fixed', 'data-keep-expanded' => 'false']);

        return $menu;
    }

    public function testView()
    {
        return view('admin.layout.main');
    }

    public function html()
    {
        dd(\Form::input('text', 'name', 'Tran Viet Trung'));
        return 'trung';
    }
}
