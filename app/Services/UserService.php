<?php
/**
 * User: Viet Trung
 * Date: 27/4/2016
 * Time: 9:57 AM
 */

namespace Hoster\Services;

use Illuminate\Http\Request;
use Validator;
use Hoster\Http\Requests\UserRequest;
use Hoster\Model\User\Role;
use Hoster\Model\User\User;

class UserService
{

    protected static $upload;
    protected static $user_avatar_config;

    public static function create(Request $request)
    {
        $inputs = $request->except('avatar', 'roles');

        // upload user avatar
        $avatar_path = User::uploadAvatar($request->file('avatar'));
        $inputs['avatar'] = $avatar_path;

        // If no roles are selected, set to user's roles
        $user_roles_id = Role::where('slug', 'user')->first()->id;
        $roles = $request->input('roles', $user_roles_id);

        // Create user
        $user = User::create($inputs);
        // Attach role to user
        $user->roles()->attach($roles);
    }

    public static function edit(Request $request, $user, $update_field = [])
    {
        // Get update able field
        if(empty($update_field)) {
            $update_field = ['name', 'email', 'date_of_birth', 'phone', 'gender', 'active'];
        }

        $inputs = $request->only($update_field);

        // update user avatar
        User::uploadAvatar($request->file('avatar'), $user);

        // Get role
        $user_roles_id = Role::where('slug', 'user')->first()->id;
        $roles = $request->input('roles', null);
        if(empty($roles)) {
            $roles = [$user_roles_id];
        }

        // Update user
        $user->update($inputs);
        // Sync role
        $user->roles()->sync($roles);

        return $user;
    }

    public static function changePassword(Request $request, $user)
    {
        $inputs = $request->all();

        $validator = Validator::make($inputs, [
            'old_password'          => 'required',
            'password'              => 'required|confirmed'
        ]);

        if($validator->passes()) {
            $old_password = $request->input('old_password');
            $new_password = $request->input('password');

            if(password_verify($old_password, $user->password)) {
                $user->update(['password' => $new_password]);
                return true;
            }
        }

        return false;
    }

    public static function getAvatarConfig()
    {
        return self::$user_avatar_config;
    }

    public static function setAvatarConfig($config)
    {
        self::$user_avatar_config = $config;
    }
}

UserService::setAvatarConfig(config('image-config.user'));