<?php

namespace Hoster\Model\User;

use Carbon\Carbon;
use Core\Upload\V2\Upload;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use System\Classified\Model\Classified;

class User extends Authenticatable
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'date_of_birth', 'phone', 'gender', 'avatar', 'active', 'confirmation_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_of_birth'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->deleteFile();
        });
    }

    public static function getAvatarConfig()
    {
        return self::$user_avatar_config;
    }

    public static function uploadAvatar($file, $user = null)
    {
        if( ! empty($file)) {
            $uploader = new Upload();

            $avatar_path = $uploader->images($file, config('image-config.user'));

            if (!empty($user)) {
                $user->deleteAvatar();
                $user->update(['avatar' => $avatar_path]);
            }

            return $avatar_path;
        }
    }

    /**
     * MUTATOR
     */

    /**
     *  Encrypt password before insert into database
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Convert date before insert into database
     *
     * @param $value
     */
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    /**
     * GETTER FUNCTION
     */

    /**
     * Get date of birth property
     *
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->date_of_birth->format('d/m/Y');
    }

    /**
     * Get Email property
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get name property
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get join date property
     *
     * @return mixed
     */
    public function getJoinDate()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * Get edit link of current user
     *
     * @return string
     */
    public function getEditLink()
    {
        return route('admin.user.edit', $this->id);
    }

    /**
     * Get gender in label
     *
     * @return string
     */
    public function getGenderLabel()
    {
        return $this->gender == 1 ? 'Nam' : 'Nữ';
    }

    public function getAvatarImage()
    {
        if (empty($this->avatar)) {
            return asset('assets/admin/img/layout/default-user.png');
        } else {
            return asset('storage/user' . $this->avatar);
        }
    }

    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * CHECKING FUNCTION
     */

    /**
     * Check if user has specific role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_numeric($role)) {
            return in_array($role, $this->roles->lists('id')->toArray());
        }
    }

    /**
     * Check whether this user is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        $roles = $this->roles;

        foreach ($roles as $role) {
            if ($role->admin == 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check user is super admin
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        $super_admin_roles = Role::where('super_admin', 1)->get();

        foreach ($super_admin_roles as $role) {
            if ($this->hasRole($role->id)) {
                return true;
            }
        }

        return false;
    }

    public function hasClassifieds(Classified $classifieds)
    {
        if( empty($classifieds->user_id) ) {
            return false;
        }

        return $this->id == $classifieds->user_id;
    }

    public function deleteAvatar()
    {
        $user_avatar = $this->avatar;

        if (!empty($user_avatar)) {
            foreach(config('image-config.user') as $config) {
                $path = $config['path'] . $user_avatar;
                if(realpath($path)) {
                    @unlink($path);
                    $this->update(['avatar' => null]);
                    return $user_avatar;
                }
            }
        }

        return false;
    }

    /**
     * DATABASE RELATIONSHIP
     */

    /**
     * An user has many roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function permissions()
    {
        $permissions = Permission::select('permissions.*')
            ->join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
            ->join('roles', 'permission_role.role_id', '=', 'roles.id')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'role_user.user_id', '=', 'users.id')
            ->where('users.id', $this->id)
            ->groupBy('permissions.id');

        return $permissions;
    }

    public function classifieds()
    {
        return $this->hasMany(Classified::class);
    }

}
