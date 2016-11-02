<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 19/2/2016
 * Time: 2:41 PM
 */

namespace Hoster\Model\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'admin',
        'super_admin',
        'active'
    ];

    /**
     * GETTER FUNCTION
     */

    /**
     * Get edit link for this role
     *
     * @return string
     */
    public function getEditLink()
    {
        return route('admin.role.edit', $this->id);
    }

    /**
     * Get name of this role
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function countPermissions()
    {
        return count($this->permissions);
    }

    public function getAppends()
    {
        return $this->appends;
    }

    public function countMember()
    {
        return count($this->users);
    }

    /**
     * DATABASE RELATIONSHIP
     */

    /**
     * A role belongs to many user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}