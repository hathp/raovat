<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 25/2/2016
 * Time: 3:30 PM
 */

namespace Hoster\Model\User;


use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * GETTER FUNTION
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * DATABASE RELATIONSHIP
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}