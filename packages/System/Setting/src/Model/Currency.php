<?php


namespace System\Setting\Model;


use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    protected $fillable = [
        'name', 'code','symbol_left','symbol_right','decimal','value','default','show','order','active'
    ];

    public function getEditlink()
    {
        return route('admin.currency.edit', $this->id);
    }
	public function getDefaultlink()
    {
        return route('admin.currency.get_default', $this->id);
    }
	public function setDefaultlink()
    {
        return route('admin.currency.set_default', $this->id);
    }
	public static function getDefault()
    {
        $default =  Currency::where('value',1)->where('active',1)->orderBy('default','desc')->first();
		return (!empty($default)) ? $default : FALSE;
    }
	

}