<?php


namespace System\Product\Model;


use Carbon\Carbon;
use Hoster\Model\User\User;
use Hoster\Model\Image\ImageAlbum;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name',
        'order',
        'active'
    ];

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class)->withTimestamps();
    }

    protected $dates = ['published_at'];

    /**
     * GETTER FUNCTION
     */

    /**
     * Get title of this page
     *
     * @param null $number_of_words
     * @return mixed
     */
    public function getTitle($number_of_words = null)
    {
        if(empty($number_of_words)) {
            return $this->title;
        }
        else {
            $array_title = explode(' ', $this->title);

            if(count($array_title) > $number_of_words) {

            }
        }
    }

    public function getEditLink()
    {
        return route('admin.product-attribute.edit', $this->id);
    }

    public function getShowLink()
    {
        return route('admin.product-attribute.show', $this->id);
    }

    /**
 * Get cover image of this page
 *
 * @return null|string
 */



    /**
     * MUTATOR
     */

    /**
     *
     * @param $value
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i:s');
    }

    /**
     * DATABASE RELATION SHIP
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get cover image of this page
     *
     * @return null|string
     */

    /**
     * A Page can belong to many categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */



}