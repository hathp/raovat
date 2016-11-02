<?php
namespace Front\Model;

use Illuminate\Database\Eloquent\Model;
use System\Classified\Model\Classified;

/**
 * User: Viet Trung
 * Date: 22/4/2016
 * Time: 2:34 PM
 */
class File extends Model
{
    protected $fillable = ['classified_id', 'cover_image'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function classifieds()
//    {
//        return $this->hasMany(Classified::class);
//    }
    public function getImage($type = null)
    {
        return is_null($this->cover_image) ? asset('/assets/front/images/default-classifieds-image.jpg') : asset('/storage/classified/' . (empty($type) ? '' : $type) . $this->cover_image);
    }

    public function deleteCover()
    {
        if (!empty($this->cover_image)) {
            $configs = config('classifieds-image.classifieds_image');

            foreach($configs as $type => $config) {
                $path = realpath(public_path($config['path'] . $this->cover_image));
                if($path) {
                    @unlink($path);
                }
            }
            $this->update(['cover_image' => null]);
        }
    }

}