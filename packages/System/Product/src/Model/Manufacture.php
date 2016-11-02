<?php


namespace System\Product\Model;


use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'name', 'slug','language_id', 'active','cover_image','order','description', 'meta_title', 'meta_keyword', 'meta_description'
    ];
    public function getEditlink()
    {
        return route('admin.product-manufacture.edit', $this->id);
    }

    public function getLinkImage()
    {
        return asset('/storage/product'.$this->cover_image);
    }
    public function getViewLink()
    {
        return route('front.product.manufacture.view', [$this->slug]);
    }
    public function deleteImage()
    {
        if( ! empty($this->cover_image) ) {
            $path = 'storage/product/'.$this->cover_image;
            @unlink($path);
        }
    }
    /**
     * Get cover image of this page
     *
     * @return null|string
     */
    public function getCoverImage()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('product-image.manufacture_cover.thumbnail.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
    public function getCoverImageLarge()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('product-image.manufacture_cover.default.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
    /**
     * Delete file
     *
     * @param string $field
     */
    public function deleteFile($field = 'cover_image')
    {
        if (!empty($this->{$field})) {
            $path = realpath(public_path(config('path.product_image').$this->{$field}));
            if($path) {
                @unlink($path);
                $this->update([$field => null]);
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class)->withTimestamps();
    }

    public function product($id)
    {
        return $this->belongsTo(Product::class)->where('manufacture_id',$id);
    }
}