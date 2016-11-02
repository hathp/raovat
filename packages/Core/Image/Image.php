<?php


namespace Core\Image;

use Hoster\Model\Image\Image as ImageModel;

class Image
{
    public function delete($id, $configs)
    {
        $image = ImageModel::findOrFail($id);

        foreach($configs as $type => $config ) {
            $path = $config['path'] . $image->path;
            \Log::debug($path);
            if(realpath($path)) {
                @unlink($path);
            }
        }

        $image->delete();
    }
}