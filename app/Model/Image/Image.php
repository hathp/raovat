<?php

namespace Hoster\Model\Image;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image_album_id', 'path', 'name', 'order','link','active'];



    // GETTER FUNCTION

    public function getLink($prefix)
    {
        return asset($prefix. $this->path);
    }

    public function getCoverImage()
    {
        if( ! empty ($this->path)) {
            return asset(config('layout-image.image_layout.default.path') . $this->path);
        }
        else {
            return null;
        }
    }

    public function deleteLayoutImage()
    {
        if (!empty($this->path)) {
            $configs = config('layout-image.image_layout');

            foreach($configs as $type => $config) {
                $path = realpath(public_path($config['path'] . $this->path));
                if($path) {
                    @unlink($path);
                }
            }
            $this->update(['path' => null]);
        }
    }

    // DATABASE RELATIONSHIP

    /**
     * An image belong to an album
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(ImageAlbum::class);
    }
}
