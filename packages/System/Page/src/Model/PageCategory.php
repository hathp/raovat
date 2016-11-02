<?php


namespace System\Page\Model;

use Core\Recursive\Recursive;
use Core\Route\Route;
use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $fillable = [
        'name', 'created_by','description', 'slug','language_id', 'parent_id', 'active', 'description', 'image', 'meta_title', 'meta_keyword', 'meta_description','cover_image'
    ];

    /**
     * recursive array with name indented
     *
     * @param null $root
     * @param bool $optional
     * @param null $prefix
     * @param null $exclude
     * @return array
     */
    public static function recursiveLists($root = null, $optional = null, $prefix = null, $exclude = null)
    {
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

    public function getCoverImage()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('page-image.category_cover.thumbnail.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }

    public function getCoverImageLarge()
    {
        if( ! empty ($this->cover_image)) {
            return asset(config('page-image.category_cover.default.path') . $this->cover_image);
        }
        else {
            return null;
        }
    }
    /**
     * GETTER FUNCTION
     */

    /**
     * Get edit link of this category
     */
    public function getEditlink()
    {
        $category_slug = Route::parseUri(1);
        $category_slug = substr($category_slug, 0, strpos($category_slug, '-'));

        return route("admin.$category_slug.category.edit", $this->id);
    }
	public function getViewLink()
    {
        return route('front.page.category.view', [$this->slug]);
    }
    public function getViewLinkBlog()
    {
        return route('front.blog.category.view', [$this->slug]);
    }
    /**
     * Get name of current page category
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get all child page of this category
     *
     * @param null $id
     * @return mixed
     */
    public function childPages($id = null, $limit=null, $column=null,$order=null,$page_id=null,$paginate=null,$listCategory=null,$index = false)
    {
        // Find all child id of this category

        if( ! empty($id)) {
            if(is_array($id)) {
                $page_category_ids = $id;
            }
            else {
                $page_category_ids = Recursive::allChildId($this->all(), $id, true);
            }
        }
        else {
            $page_category_ids = Recursive::allChildId($this->all(), $this->id, true);
        }

        $pages = Page::select('pages.*')
            ->join('page_page_category', 'page_page_category.page_id', '=', 'pages.id')
            ->whereIn('page_page_category.page_category_id', $page_category_ids);
        if($index) {
            $pages->where('featured',1);
        }
        if( !empty($listCategory) ) {
            $pages->whereIn('page_category_id',$listCategory);
        }
        if( !empty($limit) ) {
            $pages->limit($limit);
        }
        if( !empty($order) ) {
            $pages->orderBy('pages.'.$column,$order);
        }
        if( !empty($page_id) ) {
            $pages->where('pages.id','!=',$page_id);
        }
        if( !empty($paginate) ) {
            return $pages->paginate($paginate);
        }else{
            return $pages->get();
        }

        return $pages;
    }

    /**
     * Get all child categories by given id
     *
     * @param $id
     * @param bool $include_root
     * @return array
     */
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
    public function pages()
    {
        return $this->belongsToMany(Page::class)->withTimestamps();
    }

    public static function listParent($limit=null, $column=null, $order=null,$category_id=null,$paginate=null)
    {
        $listParent = self::where('parent_id',$category_id)->where('active',1);
        if( !empty($limit) ) {
            $listParent->limit($limit);
        }
        if( !empty($order) ) {
            $listParent->orderBy($column,$order);
        }
        if( !empty($paginate) ) {
            return $listParent->paginate($paginate);
        }else{
            return $listParent->get();
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
            $path = realpath(public_path(config('path.page_image').$this->{$field}));
            if($path) {
                @unlink($path);
                $this->update([$field => null]);
            }
        }
    }
}