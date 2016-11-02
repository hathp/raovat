<?php


namespace Core\Image;


use Core\Upload\V2\Upload;
use Hoster\Model\Image\ImageAlbum;

class Album
{
    protected $uploader;

    protected $album;
    protected $image;

    public function __construct(Upload $uploader, Image $image)
    {
        $this->uploader = $uploader;
        $this->image = $image;
    }

    public function add($paths, $names = null)
    {
        // Get the album
        if (empty($this->album)) {
            $image_album = ImageAlbum::create();
        } else {
            $image_album = $this->album;
        }

        // check if path is array
        if (is_array($paths)) {
            foreach ($paths as $path) {
                $image_album->images()->create(['path' => $path]);
            }
        } else {
            $image_album->images()->create(['path' => $paths]);
        }

        return $image_album;
    }

    public function upload($files, $config)
    {
        if (!empty($files)) {
            $paths = $this->uploader->images($files, $config);
            $image_album = $this->add($paths);

            return $image_album->id;
        } else {
            return null;
        }

    }

    public function deleteImage($image_ids, $config = null)
    {
        if(is_array($image_ids)) {
            foreach($image_ids as $image_id) {
                $this->image->delete($image_id, $config);
            }
        }
        else {
            $this->image->delete($image_ids, $config);
        }
    }

    public function setAlbum(ImageAlbum $album = null)
    {
        $this->album = $album;
    }

}