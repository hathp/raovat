<?php


namespace System\Classified\Model;

use Core\Recursive\Recursive;
use Core\Text\Process;
use Front\Model\File;
use Hoster\Model\User\User;
use Illuminate\Database\Eloquent\Model;
use System\Classified\Services\ClassifiedService;
use System\Classified\Support\FileDelete;
use System\Setting\Model\Country;
use System\Setting\Model\Currency;
use System\Comment\Model\Comment;


class Classified extends Model
{
    use FileDelete;

    protected $fillable = [
        'user_id', 'code', 'slug', 'price', 'name', 'province_id', 'address', 'view_counter', 'image',
        'mobile', 'email', 'content', 'publish', 'home','rate_total','rate_count','raty',
        'language_id','country_id'
    ];
    protected $deleteable_file;
    protected $value_country;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->deleteable_file = ['image' => ClassifiedService::$image_config];
        $this->value_country = \Cookie::get('country');
        if($this->value_country ==null){
            $this->value_country = 1;
        }
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($classifieds) {
            $classifieds->deleteFile();
        });
    }

    // SCOPE
    /**
     * Get newest classified
     *
     * @param $query
     * @return mixed
     */
    public function scopeNewest($query)
    {
        return $query->where('publish', 1)->where('home', 1)->where('country_id', $this->value_country)->orderBy('created_at', 'desc');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeMaxView($query)
    {
        return $query->orderBy('classifieds.view_counter', 'desc')->where('country_id', $this->value_country);
    }

    /**
     * get today classified
     *
     * @param $query
     * @return mixed
     */
    public function scopeToday($query)
    {
        $today = date('Y-m-d');
        return $query->whereRaw("DATE(`created_at`) = '$today'")->where('country_id', $this->value_country);
    }

    /**
     * get this week classified
     *
     * @param $query
     * @return mixed
     */
    public function scopeWeek($query)
    {
        $day = date('w');
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));

        return $query->whereRaw("DATE(`created_at`) BETWEEN '$week_start' AND '$week_end'")->where('country_id', $this->value_country);
    }

    // GETTER FUNCTION
    /**
     * Get image of this classified
     *
     * @param null $type
     * @return string
     */
    public function getImage($type = null)
    {
        return is_null($this->image) ? asset('/assets/front/images/default-classifieds-image.jpg') : asset('/storage/classified/' . (empty($type) ? '' : $type) . $this->image);
    }


    /**
     * Get price of this classifieds
     *
     * @param null $quantity
     * @return mixed|string
     */
    public function getPrice($quantity = null)
    {
        if(!empty($quantity) && is_numeric($this->price)) {
            return $quantity * $this->price;
        }

        $price = empty($this->price) ? 'Liên hệ' : number_format($this->price) .' '. Currency::getDefault()->code;
        return $price;
    }

    /**
     * Get classified by max view_counter
     *
     * @return mixed
     */
    public static function hot()
    {
        return self::orderBy('view_counter', 'desc')->take(4)->get();
    }

    /**
     * Get other hot classified exclude this one
     *
     * @return mixed
     */
    public function otherHot()
    {
        return $this->orderBy('view_counter', 'desc')->where('country_id', $this->value_country)->whereNotIn('classifieds.id', [$this->id])->limit(6)->get();
    }

    /**
     * Get other classified within category
     *
     * @return mixed
     */
    public function getOther()
    {
        return $this->categories->first()->classifieds()->where('country_id', $this->value_country)->whereNotIn('classifieds.id', [$this->id])->limit(6)->get();
    }

    public function isOrderable()
    {
        return $this->rootCategory()->cart;
    }

    public function rootCategory()
    {
        return Recursive::root(ClassifiedCategory::all(), $this->categories->first()->id);
    }

    // DATABASE RELATION
    /**
     * A classifieds can belongs to many categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(ClassifiedCategory::class);
    }

    /**
     * A classifieds belong to province
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Process::class);
    }

    /**
     * A classified belong to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function comments()
    {
        return $this->hasMany(Comment::class,'page_id');
    }
    public function files()
    {
        return $this->hasMany(File::class,'classified_id');
    }
    public function countries()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}