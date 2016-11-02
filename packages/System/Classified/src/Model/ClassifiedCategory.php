<?php

namespace System\Classified\Model;

use Core\Upload\V2\Upload;
use Illuminate\Database\Eloquent\Model;
use System\Classified\Support\FileDelete;

class ClassifiedCategory extends Model
{
    use FileDelete;
    protected $fillable = [
        'parent_id', 'icon', 'name', 'slug', 'image', 'order', 'system', 'active', 'meta_title', 'meta_keyword', 'meta_description'
    ];

    protected $deleteable_file;
    public static $banner_config;
    public static $icon_config;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->deleteable_file = [
            'image' => config('classifieds-image.category_banner'),
            'icon' => config('classifieds-image.category_icon')
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($classifieds_category) {
            $classifieds_category->deleteFile();
        });
    }

    // SCOPE
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Get image
     *
     * @param $type
     * @return null|string
     */
    public function getImage($type)
    {
        if($type == 'banner') {
            if(empty($this->image)) {
                return null;
            }

            return '/' . config('classifieds-image.category_banner')['default']['path'] . $this->image;
        }

        if($type == 'icon') {
            if(empty($this->icon)) {
                return null;
            }

            return '/' . config('classifieds-image.category_icon')['default']['path'] . $this->icon;
        }
    }

    /**
     * Get banner image
     *
     * @return null|string
     */
    public function getBanner()
    {
        return $this->getImage('banner');
    }

    /**
     * Get icon image
     *
     * @return null|string
     */
    public function getIcon()
    {
        return $this->getImage('icon');
    }

    public function updateImage($file, $type)
    {
        // get config for current image
        $config = ($type == 'banner' ? self::$banner_config : self::$icon_config);
        // upload image
        $path = self::uploadImage($file, $config, $this);

        // populate property
        $property = $type == 'banner' ? 'image' : 'icon';
        // Clean trash file
        $this->deleteFile([$property => $config]);
        // update property
        $this->$property = $path;
        $this->save();
        return $path;
    }

    public static function uploadImage($file, $config)
    {
        if( ! empty($file)) {
            $uploader = new Upload();
            $path = $uploader->images($file, $config);

            return $path;
        }
    }

    public static function uploadBanner($file, $category = null)
    {
        if( ! empty($file)) {
            $uploader = new Upload();

            $banner_path = $uploader->images($file, self::$banner_config);

            return $banner_path;
        }

        return null;
    }

    public static function uploadIcon($file, $category = null)
    {
        if( ! empty($file)) {
            $uploader = new Upload();

            $icon_path = $uploader->images($file, self::$icon_config);

            return $icon_path;
        }

        return null;
    }

    public function child()
    {
        $child = collect();

        foreach(self::all() as $category) {
            if($this->id == $category->parent_id) {
                $child->push($category);
            }
        }

        return $child;
    }

    /**
     * An category can have many classified
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classifieds()
    {
        return $this->belongsToMany(Classified::class);
    }
    public function classifieds_countr()
    {
        $value_country = \Cookie::get('country');
        $classifieds = $this->belongsToMany(Classified::class);
        if($value_country !=null){
            $classifieds->where('country_id',$value_country);
        }
        return $classifieds;
    }

}

ClassifiedCategory::$banner_config = config('classifieds-image.category_banner');
ClassifiedCategory::$icon_config = config('classifieds-image.category_icon');