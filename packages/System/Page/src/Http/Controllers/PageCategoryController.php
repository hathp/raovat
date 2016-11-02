<?php


namespace System\Page\Http\Controllers;

use Core\Route\Route;
use Core\Upload\V2\Upload;
use Illuminate\Http\Request;
use System\Page\Http\Requests\PageCategoryRequest;
use System\Page\Model\Page;
use System\Page\Model\PageCategory;
use System\Setting\Model\Language;

class PageCategoryController extends PageBaseController
{

    protected $page_category_slug;

    protected $uploader;

    public function __construct(Upload $uploader)
    {
        $slug = Route::parseUri(1);
        $this->page_category_slug = substr($slug, 0, strpos($slug, '-'));
        $this->uploader = $uploader;
    }

    /**
     * Listing all page category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function index()
    {
        $page_category = PageCategory::where('slug', $this->page_category_slug)->first();
        if (empty($page_category)) {
            abort(404);
        }

        $category_list = PageCategory::recursiveLists($page_category->id, [$page_category->id => 'Trống']);
        $categories_array = PageCategory::recursiveLists($page_category->id, null, '&#9480;&#9480;');

        $delete_link = route("admin.$this->page_category_slug.category.destroy");
        $store_link = route("admin.$this->page_category_slug.category.store");
        $category_link = route("admin.$this->page_category_slug.category.find");
        $page_categories = collect();
        foreach ($categories_array as $category_id => $category_name) {
            $category = PageCategory::findOrFail($category_id);
            $category->name = $category_name;
            $page_categories->push($category);
        }

        $data = [
            'page_title'         => 'Nhóm bài viết',
            'category_list'      => $category_list,
            'page_categories'    => $page_categories,
            'lang_list'          => Language::lists('name','id')->toArray(),
            'page_category_slug' => $this->page_category_slug,
            'delete_link'        => $delete_link,
            'category_link'        => $category_link,
            'store_link'         => $store_link,
        ];

        return view('page::category.index', $data);
    }

    /**
     * Store a new page category
     *
     * @param Request|PageCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PageCategoryRequest $request)
    {
        $inputs = $request->all();
        $inputs['created_by'] = \Auth::user()->id;

        // Upload cover image
        $cover_image_path = $this->uploader->images($request->file('cover_image'), config('page-image.category_cover'));

        // Cover image path
        $inputs['cover_image'] = $cover_image_path;

        PageCategory::create($inputs);

        return $this->redirectTo();
    }

    /**
     * Show an article
     *
     * @param $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($page_category_id)
    {
        $page_category = PageCategory::findOrFail($page_category_id);

        $data = [
            'page_title'    => 'Thông tin nhóm: ' . $page_category->name,
            'page_category' => $page_category
        ];

        return view('page::category.show', $data);
    }

    /**
     * Show all page within a category
     *
     * @param $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages($page_category_id)
    {

        // Get category slug from uri
        if (empty($page_category_id)) {
            $page_category = PageCategory::where('slug', $this->page_category_slug)->first();
        } else {
            $page_category = PageCategory::findOrFail($page_category_id);
        }

        $ajax_toggle_link = route("admin.$this->page_category_slug.toggle");
        $ajax_delete_link = route("admin.$this->page_category_slug.destroy");
        $create_page_link = route("admin.$this->page_category_slug.create");
        $ajax_featured_link = route("admin.$this->page_category_slug.featured");
        $ajax_category_link =  route("admin.$this->page_category_slug.find");
        $data = [
            'page_title'       => $page_category->name,
            'pages'            => $page_category->childPages(),
            'ajax_toggle_link' => $ajax_toggle_link,

            'ajax_delete_link' => $ajax_delete_link,
            'ajax_featured_link' => $ajax_featured_link,
            'page_category_slug' => $this->page_category_slug,
            'create_link'      => $create_page_link,
            'ajax_category_link' => $ajax_category_link
        ];

        return view('page::category.page', $data);
    }

    /**
     * Show edit category form
     *
     * @param $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($page_category_id)
    {
        // find page category
        $page_category = PageCategory::findOrFail($page_category_id);
        // root page category
        $root_page_category = PageCategory::where('slug', $this->page_category_slug)->first();

        if (is_null($root_page_category)) abort(404);

        // update link
        $page_category_update_link = route("admin.$this->page_category_slug.category.update", $page_category_id);

        $category_list = PageCategory::recursiveLists($root_page_category->id, [$root_page_category->id => 'Trống'], null, $page_category_id);

        $data = [
            'page_title'    => 'Sửa nhóm',
            'page_category' => $page_category,
            'lang_list'          => Language::lists('name','id')->toArray(),
            'update_link'   => $page_category_update_link,
            'category_list' => $category_list
        ];

        return view('page::category.edit', $data);
    }

    /**
     * Update a category
     *
     * @param $id
     * @param PageCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PageCategoryRequest $request)
    {
        $page_categories = PageCategory::findOrFail($id);

        $inputs = $request->all();

        if ($request->hasFile('cover_image')) {

            $page_categories->deleteFile();
            $cover_image_path = $this->uploader->images($request->file('cover_image'), config('page-image.category_cover'));
            // Cover image path
            $inputs['cover_image'] = $cover_image_path;
        }

        $page_categories->update($inputs);

        return $this->redirectTo();
    }

    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        PageCategory::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    /**
     * delete category and any sub-category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|int
     */
    public function destroy(Request $request)
    {


        $page_category_ids = $request->input('id');

        $page_category_ids = PageCategory::childCategories($page_category_ids, true);

        if ($request->has('delete_page')) {
            $pages = Page::select('pages.*')
                ->join('page_page_category', 'page_page_category.page_id', '=', 'pages.id')
                ->whereIn('page_page_category.page_category_id', $page_category_ids)
                ->get();

            $pages = $pages->pluck('id')->toArray();

            Page::destroy($pages);
        }

        PageCategory::destroy($page_category_ids);

        if ($request->ajax()) {
            return 1;
        } else {

            return redirect()->back();

        }
    }

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     */
    public function toggleState(Request $request)
    {
        $user_id = $request->input('id');
        $page_category = PageCategory::findOrFail($user_id);

        $property = $request->input('property', null);

        if ($page_category->$property == 1 || $page_category->$property == 0) {
            if ($page_category->$property == 1) {
                $page_category->$property = 0;
            } else {
                $page_category->$property = 1;
            }
            $page_category->save();

            return $page_category->$property;
        } else {
            abort(422);
        }
    }

    public function find(Request $request)
    {

        $category_id = $request->input('category_id');

        $categories_array = PageCategory::recursiveLists($category_id, null, '&#9480;&#9480;');

        $page_categories = collect();
        foreach ($categories_array as $category_id => $category_name) {
            $category = PageCategory::findOrFail($category_id);
            $category->name = $category_name;
            $page_categories->push($category);
        }
        $data = [
            'page_categories'    => $page_categories,
            'page_category_slug' => $this->page_category_slug,
        ];
        return view('page::category.find',$data);

    }

}