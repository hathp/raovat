<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 25/2/2016
 * Time: 3:30 PM
 */

namespace Hoster\Model\User;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * GETTER FUNCTION
     */

    /**
     * Get name of this permission
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * DATABASE RELATIONSHIP
     */

    /**
     * A permission belongs to a group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permissionGroup()
    {
        return $this->belongsTo(PermissionGroup::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}