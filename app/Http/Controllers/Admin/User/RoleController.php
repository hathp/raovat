<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 25/2/2016
 * Time: 1:28 PM
 */

namespace Hoster\Http\Controllers\Admin\User;

use Core\Text\Process;
use Hoster\Model\User\PermissionGroup;
use Hoster\Model\User\Role;
use Illuminate\Http\Request;

class RoleController extends UserBaseController
{
    /**
     * Listing all roles
     */
    public function index()
    {
        $roles = Role::all();

        $data = [
            'page_title' => 'Danh sách nhóm người dùng',
            'roles'      => $roles
        ];

        return view('admin.role.index', $data);
    }

    /**
     * Show a single role
     *
     * @param $role_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($role_id)
    {
        $role = Role::findOrFail($role_id);

        $data = [
            'page_title' => 'Thông tin nhóm người dùng',
            'role'       => $role,
        ];

        return view('admin.role.show', $data);
    }

    /**
     * Show create new role form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'page_title'        => 'Thêm nhóm mới',
            'permission_groups' => PermissionGroup::all()
        ];

        return view('admin.role.create', $data);
    }

    /**
     * Store new role
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // Get request input
        $inputs = $request->only(['name', 'admin', 'super_admin', 'active']);
        // get slug from name
        $inputs['slug'] = Process::strToSlug($inputs['name']);

        // Permissions
        $permissions = $request->input('permissions', []);
        $role = Role::create($inputs);

        $role->permissions()->attach($permissions);

        return $this->redirectTo();
    }

    /**
     * Show edit role form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $data = [
            'page_title'        => 'Chính sửa nhóm người dùng',
            'permission_groups' => PermissionGroup::all(),
            'role'              => $role,
            'role_permission'   => $role->permissions->lists('id')->toArray()
        ];

        return view('admin.role.edit', $data);
    }

    /**
     * Update a role
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);

        $inputs = $request->all();
        $role->update($inputs);

        $permissions = $request->input('permission', []);

        $role->permissions()->sync($permissions);

        flash()->success('Cập nhật nhóm thành công');

        return $this->redirectTo();
    }

    /**
     * Delete role
     *
     * @param $id
     * @param Request $request
     */
    public function destroy($id, Request $request)
    {
        $id = $request->input('id');

        Role::destroy($id);
    }

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     */
    public function toggleState(Request $request)
    {
        $user_id = $request->input('id');
        $user = Role::findOrFail($user_id);

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
}