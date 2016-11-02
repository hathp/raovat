<?php


namespace System\Setting\Model;


use Illuminate\Database\Eloquent\Model;


class Country extends Model
{

    protected $fillable = [
        'name', 'code', 'order','active'
    ];

    public function getEditlink()
    {
        return route('admin.country.edit', $this->id);
    }

    public function setCookiesLink()
    {
        return route('front.user.classified.cookies', $this->id);
    }


}