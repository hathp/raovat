<?php


namespace System\Product\Model;

use Core\Recursive\Recursive;
use Illuminate\Database\Eloquent\Model;


class ProductCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'parent_id','language_id', 'active','cover_image','order','description', 'meta_title', 'meta_keyword', 'meta_description'
    ];

    /**
     * recursive array with name indented
     *
     * @param null $root
     * @param bool $optional
     * @param null $prefix
     * @return array
     */
    public static function recursiveLists($root = null, $optional = null, $prefix = null, $exclude = null)
    {
        //$category_list = self::all(['id', 'name', 'parent_id'])->toArray();

        if(is_numeric($exclude)) {
            $exclude_category_id = self::childCategories($exclude, true);
            $category_list = self::whereNotIn('id', $exclude_category_id)->select('id', 'name', 'parent_id')->get()->toArray();
        }
        else {
            $category_list = self::all(['id', 'name', 'parent_id'])->toArray();
        }

        $category_list = Recursive::nameIndent($category_list, $root, $prefix);

        if(is_array($optional)) {
            $category_list = $optional + $category_list;
        }

        return $category_list;
    }

    public static function recursiveParent($optional = null)
    {
        $category_list = self::all(['id', 'name', 'parent_id'])->where('parent_id',null)->toArray();
        $category_list = Recursive::nameIndent($category_list);
        if(is_array($optional)) {
            $category_list = $optional + $category_list;
        }
        return $category_list;
    }

    public static function getParentRoot($category_id = null)
    {
        $category_chind = self::findOrFail($category_id);
        if($category_chind->parent_id == null ){
            return $category_chind;
        }
        $category_list = self::all(['id', 'name', 'parent_id']);
        $category_root = Recursive::getParentRoot($category_list,$category_chind->parent_id);
        return $category_root;
    }
	public static function listParent($limit=null, $column=null, $order=null,$category_id=null)
    {
        $listParent = self::where('parent_id',$category_id)->where('active',1);
        if( !empty($limit) ) {
            $listParent->limit($limit);
        }
        if( !empty($order) ) {
            $listParent->orderBy($column,$order);
        }
        return $listParent->get();

    }
    /**
     * GETTER FUNCTION
     */

    /**
     * Get edit link of this category
     */
    public function getEditlink()
    {
        return route('admin.product-category.edit', $this->id);
    }

    public function getLinkImage()
    {
        return asset('/storage/productcategory'.$this->cover_image);
    }
	public function getViewLink()
    {
        return route('front.product.category.view', [$this->slug]);
    }
    public function deleteImage()
    {
        if( ! empty($this->cover_image) ) {
            $path = 'storage/productcategory/'.$this->cover_image;
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


    /**
     * Get all child page of this category
     *
     * @return mixed
     */
    public function childProducts($id = null,$limit = null,$column=null,$order=null,$product_id=null,$paginate=null,$listCategory=null,$index = false)
    {
        // Find all child id of this category
        if( ! empty($id)) {
            if(is_array($id)) {
                $product_category_ids = $id;
            }
            else {
                $product_category_ids = Recursive::allChildId($this->all(), $id, true);
            }
        }
        else {
            $product_category_ids = Recursive::allChildId($this->all(), $this->id, true);
        }

        $products = Product::select('products.*')
            ->join('product_product_category', 'product_product_category.product_id', '=', 'products.id')
            ->whereIn('product_product_category.product_category_id', $product_category_ids);
            if($index) {
                $products->where('featured',1);
            }
            if( !empty($listCategory) ) {
                $products->whereIn('product_category_id',$listCategory);
            }
            if( !empty($limit) ) {
                $products->limit($limit);
            }
            if( !empty($limit) ) {
                $products->limit($limit);
            }
            if( !empty($order) ) {
                $products->orderBy('products.'.$column,$order);
            }
            if( !empty($product_id) ) {
                $products->where('products.id','!=',$product_id);
            }
            if( !empty($paginate) ) {
                return $products->paginate($paginate);
            }else{
                return $products->get();
            }
        return $products;
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
     * DATABASE RELATIONSHIP
     */

    /**
     * A category can have many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withTimestamps();
    }
    public function manufactures()
    {
        return $this->belongsToMany(Manufacture::class)->withTimestamps();
    }
}