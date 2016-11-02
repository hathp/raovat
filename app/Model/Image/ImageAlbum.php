<?php

namespace Hoster\Model\Image;

use Illuminate\Database\Eloquent\Model;

class ImageAlbum extends Model
{
    protected $fillable = ['name','slug'];

    /**
     * An album can have many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('order', 'desc')->where('active',1);
    }
}
