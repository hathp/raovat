<?php

namespace System\Setting\Model;


use Illuminate\Database\Eloquent\Model;


class Language extends Model
{
    protected $fillable = [
        'name', 'lang', 'order','active'
    ];

    public function getEditlink()
    {
        return route('admin.language.edit', $this->id);
    }

}