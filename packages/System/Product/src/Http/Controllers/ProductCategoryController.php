<?php


namespace System\Product\Http\Controllers;

use Core\Query\Query;
use Core\Text\Process;
use Core\Route\Route;
use Core\Upload\V2\Upload;
use Illuminate\Http\Request;
use System\Product\Model\Product;
use System\Product\Model\ProductCategory;
use System\Product\Http\Requests\ProductCategoryRequest;
use System\Setting\Model\Language;


class ProductCategoryController extends ProductBaseController
{
    protected $upload;

    //protected $product_category_slug;

    public function __construct(Upload $upload)
    {
        $this->upload = $upload;

        //$slug = Route::parseUri(1);

        //$this->product_category_slug = substr($slug, 0, strpos($slug, '-'));
    }
    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $category_list = ProductCategory::recursiveLists(null, ['0' => 'Trống']);

        $categories_array = ProductCategory::recursiveLists(null, null, '&#9480;&#9480;');

        $product_categories = collect();

        foreach ($categories_array as $category_id => $category_name) {
            $category = ProductCategory::findOrFail($category_id);
            $category->name = $category_name;
            $product_categories->push($category);
        }

//        dd($product_categories->toArray());
        $data = [
            'page_title'      => 'Nhóm sản phẩm',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'category_list'   => $category_list,
            'product_categories' => $product_categories
        ];

        return view('product::category.index', $data);
    }

    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductCategoryRequest $request)
    {

        $inputs = $request->except('cover_image');

       // $inputs['slug'] = Process::strToSlug($inputs['name']);

        if ($inputs['parent_id'] == '0') {
            $inputs['parent_id'] = null;
        }

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('product_categories');
        }

        // Upload cover image
        //$cover_image_path = $this->upload->image($request, 'cover_image', 'storage/productcategory');
        // Upload cover image
        $cover_image_path = $this->upload->images($request->file('cover_image'), config('product-image.product_cover'));

        // Cover image path
        $inputs['cover_image'] = $cover_image_path;

        ProductCategory::create($inputs);

        return $this->redirectTo();
    }

    public function edit($product_category_id)
    {

        $product_category = ProductCategory::findOrFail($product_category_id);

        $category_list = ProductCategory::recursiveLists(null, ['0' => 'Trống'], null, $product_category_id);

        $data = [
            'page_title'    => 'Sửa nhóm sản phẩm',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'product_category' => $product_category,
            'category_list'   => $category_list,
        ];

        return view('product::category.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ProductCategoryRequest $request)
    {
        $product_category = ProductCategory::findOrFail($id);

        // Get update able filed
        $inputs = $request->except('cover_image');

        //$inputs['slug'] = Process::strToSlug($inputs['name']);

        if ($inputs['parent_id'] == '0') {
            $inputs['parent_id'] = null;
        }

        //order
        if(empty($inputs['order'])){
            $inputs['order'] =  Query::getMaxFieldValue('product_categories');
        }

        if ($request->hasFile('cover_image')) {
            // Upload cover image
            //$cover_image_path = $this->upload->image($request, 'cover_image', 'storage/productcategory');
            //delete image
            //$product_category->deleteImage();
            $product_category->deleteFile();
            $cover_image_path = $this->upload->images($request->file('cover_image'), config('product-image.product_cover'));
            // Cover image path
            $inputs['cover_image'] = $cover_image_path;
        }

        // Update product_category
        $product_category->update($inputs);

        return $this->redirectTo();
    }
    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        ProductCategory::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }


    public function show($id)
    {
        $product_category = ProductCategory::findOrFail($id);

        $data = [
            'page_title'    => 'Thông tin nhóm: ' . $product_category->name,
            'product_category' => $product_category
        ];

        return view('product::category.show', $data);
    }

    /**
     * Show all page within a category
     *
     * @param $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products($product_category_id)
    {
//        // Get category slug from uri
//
//        $product_category = ProductCategory::findOrFail($product_category_id);
//
//        $data = [
//            'page_title'       => $product_category->name,
//            'products'            => $product_category->childProducts(),
//        ];
//
//        return view('product::category.product', $data);
    }

    public function destroy(Request $request)
    {
        $product_category_ids = $request->input('id');

        $product_category = ProductCategory::findOrFail($product_category_ids);

        $product_category_ids = ProductCategory::childCategories($product_category_ids, true);

        $products = $product_category->childProducts($product_category_ids);

        if(count($products) > 0){
            return count($products);
        }else{
            ProductCategory::deleteFile();
            ProductCategory::destroy($product_category_ids);
            return 0;
        }

//        if($request->has('delete_product')) {
//            $products = Product::select('products.*')
//                ->join('product_product_category', 'product_product_category.product_id', '=', 'products.id')
//                ->whereIn('product_product_category.product_category_id', $product_category_ids)
//                ->get();
//
//            $products = $products->pluck('id')->toArray();
//
//            Product::destroy($products);
//        }

        //ProductCategory::destroy($product_category_ids);

        //ProductCategory::deleteFile();

        if($request->ajax()) {
            return 1;
        }
        else {
            return $this->redirectTo();
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
        $product_category = ProductCategory::findOrFail($user_id);

        $property = $request->input('property', null);

        if ($product_category->$property == 1 || $product_category->$property == 0) {
            if ($product_category->$property == 1) {
                $product_category->$property = 0;
            } else {
                $product_category->$property = 1;
            }
            $product_category->save();

            return $product_category->$property;
        } else {
            abort(422);
        }
    }
    public function find(Request $request)
    {
        $category_id = $request->input('category_id');

        if($category_id != 0 ) {
            $categories_array = ProductCategory::recursiveLists($category_id, null, '&#9480;&#9480;');
        }
        else{
            $categories_array = ProductCategory::recursiveLists(null, null, '&#9480;&#9480;');
        }

        $product_categories = collect();
        foreach ($categories_array as $category_id => $category_name) {
            $category = ProductCategory::findOrFail($category_id);
            $category->name = $category_name;
            $product_categories->push($category);
        }
        return view('product::category.category', ['product_categories' => $product_categories]);

    }
}