<?php
/**
 * User: Viet Trung
 * Date: 26/4/2016
 * Time: 2:43 PM
 */

namespace Front\Http\Controllers;

use Auth;
use Hoster\Http\Requests\UserRequest;
use Hoster\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function publishedClassifieds()
    {
        $classifieds = $this->user->classifieds;

        $data  = [
            'classifieds' => $classifieds
        ];

        return view('front::user.published-classified', $data);
    }

    public function edit()
    {
        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('front::user.edit', $data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        UserService::edit($request, $user, ['name', 'date_of_birth', 'gender', 'phone']);

        return redirect(route('front.user.edit'));
    }

    public function changePassword()
    {
        return view('front::user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        UserService::changePassword($request, $user);

        return redirect(route('front.user.edit'));
    }
}