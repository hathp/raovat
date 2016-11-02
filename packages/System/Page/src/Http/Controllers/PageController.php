<?php


namespace System\Page\Http\Controllers;

use Core\File\File;
use Core\Image\Album;
use Core\Query\Query;
use Core\Route\Route;
use Core\Text\Process;
use Core\Upload\V2\Upload;
use Hoster\Model\Image\Image;
use Illuminate\Http\Request;
use System\Page\Http\Requests\PageRequest;
use System\Page\Model\Page;
use System\Page\Model\PageCategory;
use Auth;
use System\Page\Model\Tag;
use System\Setting\Model\Language;

class PageController extends PageBaseController
{

    protected $upload;
    protected $image_album;
    protected $file;
    protected $page_category_slug;
    protected $cover_image_config;
    protected $album_images_config;

    public function __construct(Upload $upload, Album $album, File $file)
    {
        $this->upload = $upload;
        $this->image_album = $album;
        $this->file = $file;
        $this->page_category_slug = Route::parseUri(1);
        $this->cover_image_config = config('page-image.page_cover');
        $this->album_images_config = config('page-image.page_album');

        view()->share('page_category_slug', $this->page_category_slug);
    }

    /**
     * Listing all page
     *
     * @param null $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($page_category_id = null)
    {
        // Get category slug from uri
        if (empty($page_category_id)) {
            $page_category = PageCategory::where('slug', $this->page_category_slug)->first();
        } else {
            $page_category = PageCategory::findOrFail($page_category_id);
        }

        $category_list = PageCategory::recursiveLists($page_category->id, [$page_category->id => 'Trống']);

        $ajax_toggle_link = route("admin.$this->page_category_slug.toggle");
        $ajax_delete_link = route("admin.$this->page_category_slug.destroy");
        $ajax_featured_link = route("admin.$this->page_category_slug.featured");
        $ajax_category_link =  route("admin.$this->page_category_slug.find");
        $data = [
            'page_title'       => $page_category->name,
            'category_list'   => $category_list,
            'pages'            => $page_category->childPages(),
            'ajax_toggle_link' => $ajax_toggle_link,
            'lang_list'          => Language::lists('name','id')->toArray(),
            'ajax_delete_link' => $ajax_delete_link,
            'ajax_featured_link' => $ajax_featured_link,
            'ajax_category_link' => $ajax_category_link
        ];

        return view('page::page.index', $data);
    }

    /**
     * Show a page
     *
     * @param $id
     * @return string
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);

        $data = [
            'page_title' => 'Thông tin bài viết',
            'page'       => $page,
        ];

        return view("page::page.show", $data);
    }

    /**
     * Show create new page form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //  Get category slug from uri
        $page_category = PageCategory::where('slug', $this->page_category_slug)->first();
        $store_page_link = route("admin.$this->page_category_slug.store");
        $category_lists = PageCategory::recursiveLists($page_category->id);

        if (count($category_lists) == 0) {
            flash()->warning('Hãy tạo một danh mục mới trước khi thêm trang mới');

            return redirect(route("admin.$this->page_category_slug.category.index"));
        }

        $data = [
            'page_title'     => 'Thêm bài viết mới',
            'category_lists' => $category_lists,
            'lang_list'          => Language::lists('name','id')->toArray(),
            'store_link'     => $store_page_link
        ];


        return view('page::page.create', $data);
    }

    /**
     * Store a new Page
     *
     * @param PageRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PageRequest $request)
    {
        // Upload album image
        $image_album_id = $this->image_album->upload($request->file('album_images'), $this->album_images_config);
        // Upload cover image
        $cover_image_path = $this->upload->images($request->file('cover_image'), $this->cover_image_config);

        // Request required field
        $post_inputs = $request->only([
            'title',
            'slug',
            'brief',
            'content',
            'link',
            'publish',
            'meta_title',
            'meta_keyword',
            'meta_description'
        ]);

        // Cover image path
        $post_inputs['cover_image'] = $cover_image_path;
        // Published time
        $post_inputs['published_at'] = $request->input('published_at', date('d/m/Y H:i'));
        // Creator
        $post_inputs['created_by'] = Auth::user()->id;
        // Image album
        $post_inputs['image_album_id'] = $image_album_id;
        // Order
        $post_inputs['order'] = Query::getMaxFieldValue('pages', 'order');

        $post_inputs = Process::setNullArrayValueIfEmpty($post_inputs);

        $page = Page::create($post_inputs);

        // Attach Page category
        $page_category_ids = intval($request->input('page_category_id'));
        $page->categories()->attach($page_category_ids);

        // Attach tag
        $tags = $request->input('tags', []);
        $tags = Tag::getTagIdByName($tags);
        $page->tags()->attach($tags);

        flash()->success('Tạo trang mới thành công');

        return $this->redirectTo();
    }

    /**
     * Show edit form page
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        $update_link = route("admin.$this->page_category_slug.update", $page->id);
        $page_category = PageCategory::where('slug', $this->page_category_slug)->first();

        $data = [
            'page_title'     => 'Sửa bài viết',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'page'           => $page,
            'update_link'    => $update_link,
            'category_lists' => PageCategory::recursiveLists($page_category->id)
        ];

        return view('page::page.edit', $data);
    }

    /**
     * Update a page
     *
     * @param $id
     * @param PageRequest $request
     * @internal param $PageRequest $
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PageRequest $request)
    {
        $page = Page::findOrFail($id);

        $inputs = $request->except(['cover_image', 'album_images']);


        if ($request->hasFile('cover_image')) {
            $page->deleteCover();
            $cover_image_path = $this->upload->images($request->file('cover_image'), $this->cover_image_config);

            $inputs['cover_image'] = $cover_image_path;
        }

        if ($request->hasFile('album_images')) {
            $this->image_album->setAlbum($page->imageAlbum);
            $image_album_id = $this->image_album->upload($request->file('album_images'), $this->album_images_config);

            $inputs['image_album_id'] = $image_album_id;
        }

        $page->update($inputs);

        // Update album image
        $album_image_labels = $request->input('album_image_labels', []);
        foreach ($album_image_labels as $album_image_id => $album_image_label) {
            $image = Image::findOrfail($album_image_id);
            $image->update(['name' => $album_image_label]);
        }

        $album_image_orders = $request->input('album_image_order', []);
        foreach ($album_image_orders as $album_image_id => $album_image_order) {
            $image = Image::findOrfail($album_image_id);
            $image->update(['order' => $album_image_order]);
        }

        // Sync Page category
        $page_category_ids[] = intval($request->input('page_category_id'));

        $page->categories()->sync($page_category_ids);

        // Sync tag
        $tags = $request->input('tags', []);

        $tags = Tag::getTagIdByName($tags);
        $page->tags()->sync($tags);

        flash()->success('Cập nhật trang thành công');

        return $this->redirectTo();
    }

    /**
     * Update a field with give id item
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        Page::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    /**
     * Delete a page
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|int
     */
    public function destroy(Request $request)
    {
        if ($request->has('delete_image')) {
            $image_id = $request->input('id');

            $this->image_album->deleteImage($image_id, $this->album_images_config);

            return 1;
        }

        Page::destroy($request->input('id'));

        return $this->redirectTo();
    }

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     * @return int
     */
    public function toggleState(Request $request)
    {
        $page_id = $request->input('id');
        $page = Page::findOrFail($page_id);

        $property = $request->input('property', null);

        if ($page->$property == 1 || $page->$property == 0) {
            if ($page->$property == 1) {
                $page->$property = 0;
            } else {
                $page->$property = 1;
            }
            $page->save();

            return $page->$property;
        } else {
            abort(422);
        }
    }

    public function find(Request $request)
    {

        $category_id = $request->input('category_id');
        if($category_id != 0 ){
            $page_category = PageCategory::findOrFail($category_id);
            $pages = $page_category->childPages();
        }else{
            $pages = Page::orderBy('order', 'desc')->get();
        }

        return view('page::page.find', ['pages' => $pages]);

    }

}