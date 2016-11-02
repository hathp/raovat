<?php

namespace System\Page\Model;


use Carbon\Carbon;
use Hoster\Model\Image\ImageAlbum;
use Hoster\Model\User\User;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'created_by',
        'order',
        'title',
        'slug',
        'brief',

        'link',
        'language_id',
        'image_album_id',
        'cover_image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'content',
        'published_at',
        'publish'
    ];

    protected $dates = ['published_at'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($page) {
            $page->deleteCover();
            $page->deleteAlbum();
        });
    }

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

    /**
     * Get edit link of current Page
     *
     * @return string
     */
    public function getEditLink()
    {
        return route('admin.article.edit', $this->id);
    }
	public function getViewLink()
    {
        return route('front.page.post', $this->slug);
    }

    /**
     * Get cover image of this page
     *
     * @return null|string
     */
    public function getCoverImage()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('page-image.page_cover.thumbnail.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
	public function getCoverImageLarge()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('page-image.page_cover.default.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }

    public function tagLists()
    {
        return implode(',', $this->tags->pluck('name')->toArray());
    }

    /**
     * MUTATOR
     */

    /**
     *  For published time before insert into database
     * @param $value
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i:s');
    }

    /**
     * FILE
     */

    /**
     * Delete file
     *
     * @internal param string $field
     */
    public function deleteCover()
    {
        if (!empty($this->cover_image)) {
            $configs = config('page-image.page_cover');

            foreach($configs as $type => $config) {
                $path = realpath(public_path($config['path'] . $this->cover_image));
                if($path) {
                    @unlink($path);
                }
            }
            $this->update(['cover_image' => null]);
        }
    }

    public function deleteAlbum()
    {
        $image_config = config('page-image.page_album');

        foreach($this->imageAlbum->images as $image) {
            foreach($image_config as $config) {
                $path = $config['path'] . $image->path;
                if(realpath($path)) {
                    @unlink($path);
                }
            }
        }

//        ImageAlbum::destroy($this->image_album_id);
    }

    /**
     * DATABASE RELATION SHIP
     */

    /**
     * A user can have many page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * A Page can belong to many categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(PageCategory::class)->withTimestamps();
    }

    public function imageAlbum()
    {
        return $this->belongsTo(ImageAlbum::class);
    }

    /**
     * A Page can have many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}