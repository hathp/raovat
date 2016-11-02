<?php


namespace System\Product\Model;

use Core\Recursive\Recursive;
use Illuminate\Database\Eloquent\Model;


class ProductOption extends Model
{
    protected $fillable = [
        'name', 'product_category_id','language_id', 'parent_id', 'active', 'order'
    ];

    /**
     * recursive array with name indented
     *
     * @param null $root
     * @param bool $optional
     * @param null $prefix
     * @return array
     */
    public static function recursiveLists($root = null, $optional = null, $prefix = null)
    {
        $option_list = self::all(['id', 'name', 'parent_id'])->toArray();

        $option_list = Recursive::nameIndent($option_list, $root, $prefix);

        if(is_array($optional)) {
            $category_list = $optional + $option_list;
        }

        return $option_list;
    }

    public static function getListOption($parent_id = null)
    {
        $option_list = self::where('parent_id',$parent_id)->get();

        return $option_list;
    }
    public static function getListOptionValue($parent_id = null,$product_id = null)
    {
        $option_list_value = self::join('product_option_values', 'product_option_values.product_option_id', '=', 'product_options.id')
                            ->select('product_options.id','product_options.name','product_option_values.value')
                            ->where('parent_id',$parent_id)->get();
                            //->where('product_option_values.product_id',$product_id)->get();
        return $option_list_value;
    }

    public static function getListOptionRoot($product_category_id = null)
    {
        $option_list_root = self::where('product_category_id',$product_category_id)->whereNull('parent_id')->get();

        return $option_list_root;
    }
    public static function getListOptionChind($product_category_id = null)
    {
        $option_list_root = self::where('product_category_id',$product_category_id)->where('parent_id','<>','')->get();

        return $option_list_root;
    }
    public static function childCategories($id, $include_root = false)
    {
        if(is_array($id)) {
            $ids = $id;
        }
        else {
            $ids[] = $id;
        }

        $array_ids = [];
        $all_category_collection = self::all();

        foreach($ids as $id) {
            $array_ids[] = Recursive::allChildId($all_category_collection, $id, $include_root);
        }

        $array_ids = array_values(array_unique(array_flatten($array_ids)));

        return $array_ids;
    }

    /**
     * GETTER FUNCTION
     */

    /**
     * Get edit link of this category
     */
    public function getEditlink()
    {
        return route('admin.product-option.edit', $this->id);
    }

    public function getLinkImage()
    {
        return asset('/storage/productcategory'.$this->cover_image);
    }

    public function deleteImage()
    {
        if( ! empty($this->cover_image) ) {
            $path = 'storage/productcategory/'.$this->cover_image;
            @unlink($path);
        }
    }

    public function getName()
    {
        return $this->name;
    }


    /**
     * Get all child page of this category
     *
     * @return mixed
     */
    public  function childProductOptions()
    {
        // Find all child id of this category
        $product_category_ids = Recursive::allChildId($this->all(), $this->id, true);

        $productOptions = $this->whereIn('id', $product_category_ids)->get();

        return $productOptions;
    }

    /**
     * DATABASE RELATIONSHIP
     */

    /**
     * A category can have many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function pages()
    {
        return $this->belongsToMany(Page::class)->withTimestamps();
    }
    public function option_value()
    {
        return $this->hasMany(ProductOptionValue::class);
    }
}