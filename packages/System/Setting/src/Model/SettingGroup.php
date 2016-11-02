<?php

namespace System\Setting\Model;


use Illuminate\Database\Eloquent\Model;

class SettingGroup extends Model
{
    protected $table = 'system_setting_groups';

    protected $fillable = ['name', 'slug'];

    /**
     * A group has many setting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function settings()
    {
        return $this->hasMany(Setting::class, 'system_setting_group_id');
    }
}