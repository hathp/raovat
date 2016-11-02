<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 18/2/2016
 * Time: 9:51 AM
 */

namespace Hoster\Http\Controllers\Admin\User;

use Core\Upload\V2\Upload;
use Hoster\Http\Requests\UserRequest;
use Hoster\Model\User\Role;
use Hoster\Model\User\User;
use Hoster\Services\UserService;
use Illuminate\Http\Request;

class UserController extends UserBaseController
{
    protected $upload;

    protected $user_avatar_config;

    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
        $this->user_avatar_config = config('image-config.user');
    }

    /**
     * Listing all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        $data = [
            'page_title' => 'Danh sách tài khoản người dùng',
            'users'      => $users
        ];

        return view('admin.user.index', $data);
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);

        $data = [
            'page_title' => 'Thông tin người dùng',
            'user' => $user
        ];

        return view('admin.user.show', $data);
    }

    /**
     * Create an user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'page_title' => 'Tạo người dùng mới'
        ];

        return view('admin.user.create', $data);
    }

    /**
     * Store new user
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        UserService::create($request);

        // Redirect to index page
        return $this->redirectTo();
    }

    /**
     * edit an user
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = [
            'page_title' => 'Sửa thông tin tài khoản',
            'user'       => $user,
            'user_roles' => $user->roles->lists('id')->toArray()
        ];

        return view('admin.user.edit', $data);
    }

    /**
     * Update an user
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);

        UserService::edit($request, $user);

        // Redirect to index page
        return $this->redirectTo();
    }

    /**
     * Delete an user
     *
     * @param $id
     * @param Request $request
     */
    public function destroy($id, Request $request)
    {
        $id = $request->input('id');

        User::destroy($id);
    }

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     */
    public function toggleState(Request $request)
    {
        $user_id = $request->input('id');
        $user = User::findOrFail($user_id);

        $property = $request->input('property', null);

        if ($user->$property == 1 || $user->$property == 0) {
            if ($user->$property == 1) {
                $user->$property = 0;
            } else {
                $user->$property = 1;
            }
            $user->save();

            return $user->$property;
        } else {
            abort(422);
        }
    }

    public function changePassword($user_id, Request $request)
    {
        $this->validate($request, [
            'old_password'          => 'required',
            'password'              => 'required|confirmed',
        ]);

        $user = User::findOrFail($user_id);

        if(UserService::changePassword($request, $user)) {
            flash()->success('Thay đổi mật khẩu thành công');
            return $this->redirectTo();
        }

        flash()->error('Mật khẩu cũ không chính xác');
        return $this->redirectTo();
    }
}