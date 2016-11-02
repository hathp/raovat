<?php

namespace System\Setting\Model;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'system_settings';

    protected $fillable = [
        'name',
        'value'
    ];

    /**
     * A setting belong to an group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(SettingGroup::class, 'system_setting_group_id');
    }

    public static function getValueBySlug($slug)
    {
        $setting = self::where('slug', $slug)->first();

        if(!empty($setting)) {
            return $setting->value;
        }


        return null;
    }

    public function getValueItem($id)
    {
        return $this->findOrFail($id)->value;
    }

    public function getCoverImage()
    {
        if($this->id == 21){
            if( ! empty ($this->value)) {
                return asset(config('setting-image.value_image.thumbnail.path') . $this->value);
            }
            else {
                return null;
            }
        }

    }
    public function getCoverImageLarge()
    {
        if($this->id == 21){
            if( ! empty ($this->value)) {
                return asset(config('setting-image.value_image.default.path') . $this->value);
            }
            else {
                return null;
            }
        }

    }

    public function deleteCover()
    {
        if($this->id == 21){
            if (!empty($this->value)) {
                $configs = config('setting-image.value_image');

                foreach($configs as $type => $config) {
                    $path = realpath(public_path($config['path'] . $this->value));
                    if($path) {
                        @unlink($path);
                    }
                }
                $this->update(['value' => null]);
            }
        }
    }
}