<?php


namespace System\Product\Model;


use Carbon\Carbon;
use Hoster\Model\User\User;
use Hoster\Model\Image\ImageAlbum;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'created_by',
        'image_album_id',
        'title',
        'slug',
        'order',
        'total',
        'options',
        'language_id',
        'price_new',
        'price_old',
        'manufacture_id',
        'brief',
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

        static::deleting(function($product) {
            $product->deleteCover();
            $product->deleteAlbum();
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

    public function getEditLink()
    {
        return route('admin.product.edit', $this->id);
    }

    public function getShowLink()
    {
        return route('admin.product.show', $this->id);
    }
	public function getViewLink()
    {
        return route('front.product.post', $this->slug);
    }
    /**
 * Get cover image of this page
 *
 * @return null|string
 */
    public function getCoverImage()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('product-image.product_cover.thumbnail.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
	public function getCoverImageLarge()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('product-image.product_cover.default.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
    public function getCoverImageMedium()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('product-image.product_cover.medium.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
    public function getCoverImageSmall()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('product-image.product_cover.small.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
    public function deleteImage()
    {
        if( ! empty($this->cover_image) ) {
            $path = 'storage/product/'.$this->cover_image;
            @unlink($path);
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

    public function deleteCover()
    {
        if (!empty($this->cover_image)) {
            $configs = config('product-image.product_cover');

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
        $image_config = config('product-image.product_album');

        foreach($this->imageAlbum->images as $image) {
            foreach($image_config as $config) {
                $path = $config['path'] . $image->path;
                if(realpath($path)) {
                    @unlink($path);
                }
            }
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

    public function imageAlbum()
    {
        return $this->belongsTo(ImageAlbum::class);
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
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class)->withTimestamps();
    }

    public  function optionValue($option_id)
    {
        return $this->hasMany(ProductOptionValue::class)->where('product_option_id',$option_id)->first();
    }
    public function productOption()
    {
        return $this->belongsToMany(ProductOption::class,'product_option_values')->withPivot('value');
    }
    public  function getListProductOption($parent_id = null)
    {
        $option_product_list = $this->productOption()->where('parent_id',$parent_id)->get();
        return $option_product_list;
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

    public function getTagLink()
    {
        return route('front.product.tag');
    }

    /**
     * tim kiem cac product theo tu khoa search
     *
     */
    public static function search($search,$pa)
    {
        //
        return self::select('products.*')->where(function($q) use ($search) {
            $q->where('brief', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%");
        })->paginate($pa);
    }
    /**
     * lay danh sach cac product loc theo tag = id
     *
     */
    public static function product_tag($id,$pa)
    {
        return self::select('products.*')->whereHas('tags', function($q) use ($id) {
            $q->where('tags.id', $id);
        })->paginate($pa);
    }

    public function attributes_set($product_id, $attributess)
    {
        foreach ($attributess as $attribute_id => $values)
        {
            // Xoa cac gia tri cu cua attributes
            $this->attributes_del($product_id, $attribute_id);

            //them vao bang product attributes
            if(isset($values['attributes']) && is_array($values['attributes']))
            {

                // Them gia tri moi
                foreach ($values['attributes'] as $value)
                {
                    // Neu khong ton tai value thi bo qua
                    if (!is_array($value))
                    {
                        continue;
                    }

                    $data = array();
                    $data['product_id']     = $product_id;
                    $data['attribute_id'] 	= $attribute_id;
                    $data['value_id'] 	    = $value['name'];
                    $data['quantity'] 		= $value['quantity'];
                    $data['amount'] 		= $value['amount'];

//                    $data['amount_prefix'] 	= $value['amount_prefix'];
                    ProductAttribute::create($data);

                }
            }
        }
    }
    function attributes_del($product_id, $attributes_id = NULL)
    {
        ProductAttribute::where('product_id',$product_id)->where('attribute_id',$attributes_id)->delete();
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}