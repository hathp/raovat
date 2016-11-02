<?php


namespace System\Product\Http\Controllers;

use Core\File\File;
use Core\Query\Query;
use Core\Image\Album;
use Core\Text\Currency;
use Illuminate\Http\Request;
use Core\Text\Process;
use Core\Upload\V2\Upload;
use Hoster\Model\Image\Image;
use System\Product\Http\Requests\ProductRequest;
use System\Product\Model\Product;
use System\Product\Model\ProductCategory;
use Auth;
use System\Product\Model\ProductOptionValue;
use System\Product\Model\Tag;
use System\Product\Model\ProductOption;
use System\Setting\Model\Language;

class ProductController extends ProductBaseController
{

    protected $upload;
    protected $image_album;
    protected $file;
    protected $album_images_config;
    protected $cover_image_config;

    public function __construct(Upload $upload, Album $album, File $file)
    {
        $this->upload = $upload;
        $this->image_album = $album;
        $this->file = $file;
        $this->cover_image_config = config('product-image.product_cover');
        $this->album_images_config = config('product-image.product_album');
    }

    public function index()
    {
        $category_list = ProductCategory::recursiveLists(null, ['0' => 'Trống']);

        $products = Product::orderBy('order', 'desc')->get();

        $data = [
            'page_title' => 'Danh sách sản phẩm',
            'category_list'   => $category_list,
            'products' => $products
        ];

        return view('product::product.index', $data);
    }

    public function create()
    {

        $data = [
            'page_title' => 'Thêm bài viết mới',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'category_lists' => ProductCategory::recursiveLists()
        ];

        return view('product::product.create', $data);
    }

    public function store(ProductRequest $request)
    {

        // Request required field
        $post_inputs = $request->except(['cover_image', 'album_images']);

        //attribute
        $productCategory   = ProductCategory::findOrFail($post_inputs['product_category_id']);
        $listAttributes = $productCategory->attributes()->get();
        $total = 0;
        if($listAttributes)
        {
            $attributes = $this->product_get_attributes($productCategory->id, $post_inputs['attributes']);
            foreach ($attributes as $attr)
            {
                $total += $attr['quantity'];
            }
            $total = intval($total);
            $post_inputs['total'] = $total;
        }

        //order
        if(empty($post_inputs['order'])){
            $post_inputs['order'] = Query::getMaxFieldValue('products');
        }

        //price
        if(!empty($post_inputs['price_new'])){
            $post_inputs['price_new'] = Currency::currency_handle_input($post_inputs['price_new']);
        }
        if(!empty($post_inputs['price_old'])){
            $post_inputs['price_old'] = Currency::currency_handle_input($post_inputs['price_old']);
        }

        // Upload album image
        $image_album_id = $this->image_album->upload($request->file('album_images'), $this->album_images_config);

        // Upload cover image
        $cover_image_path = $this->upload->images($request->file('cover_image'), $this->cover_image_config);

        // Image album
        $post_inputs['image_album_id'] = $image_album_id;
        // Cover image path
        $post_inputs['cover_image'] = $cover_image_path;
        // Published time
        $post_inputs['published_at'] = $request->input('published_at', date('d/m/Y H:i'));
        // Creator
        $post_inputs['created_by'] = Auth::user()->id;

        // get option product
        $option_products = $this->get_option_product($request);
        $post_inputs['options'] = serialize($option_products);

        $post_inputs = Process::setNullArrayValueIfEmpty($post_inputs);

        $product = Product::create($post_inputs);

        // Attach product category
        $product_category_id = $request->input('product_category_id');
        $product->categories()->attach($product_category_id);

        // Attach tag
        $tags = $request->input('tags',[]);
        $tags = Tag::getTagIdByName($tags);
        $product->tags()->attach($tags);

        //luu attribute
        if(isset($attributes))
        {
            $product->attributes_set($product->id, $attributes);
        }

        //created option value
        $this->createOptionValue($request, $product->id);

        return $this->redirectTo();
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $data = [
            'page_title'     => 'Sửa sản phẩm',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'product'           => $product,
            'category_lists' => ProductCategory::recursiveLists()
        ];

        return view('product::product.edit', $data);
    }
    public function update($id, ProductRequest $request)
    {

        $product = Product::findOrFail($id);
        // Request required field
        $post_inputs = $request->except(['cover_image', 'album_images']);

        //attribute
        $productCategory   = ProductCategory::findOrFail($post_inputs['product_category_id']);
        $listAttributes = $productCategory->attributes()->get();
        $total = 0;
        if($listAttributes)
        {
            $attributes = $this->product_get_attributes($productCategory->id, $post_inputs['attributes']);
            foreach ($attributes as $attr)
            {
                $total += $attr['quantity'];
            }
            $total = intval($total);
            $post_inputs['total'] = $total;
        }

        //order
        if(empty($post_inputs['order'])){
            $post_inputs['order'] =  Query::getMaxFieldValue('products');
        }

        //price
        if(!empty($post_inputs['price_new'])){
            $post_inputs['price_new'] = Currency::currency_handle_input($post_inputs['price_new']);
        }
        if(!empty($post_inputs['price_old'])){
            $post_inputs['price_old'] = Currency::currency_handle_input($post_inputs['price_old']);
        }

        if ($request->hasFile('cover_image')) {
            // Upload cover image
            $product->deleteFile();
            $cover_image_path = $this->upload->images($request->file('cover_image'), $this->cover_image_config);

            // Cover image path
            $post_inputs['cover_image'] = $cover_image_path;
        }

        if ($request->hasFile('album_images')) {
            $this->image_album->setAlbum($product->imageAlbum);
            $image_album_id = $this->image_album->upload($request->file('album_images'), $this->album_images_config);
            $inputs['image_album_id'] = $image_album_id;
        }

        // get option product
        $option_products = $this->get_option_product($request);
        $post_inputs['options'] = serialize($option_products);

        // Update product_category
        $product->update($post_inputs);

        // Update album image
        $album_image_labels = $request->input('album_image_labels', []);
        foreach($album_image_labels as $album_image_id => $album_image_label) {
            $image = Image::findOrfail($album_image_id);
            $image->update(['name' => $album_image_label]);
        }

        $album_image_orders = $request->input('album_image_order', []);
        foreach($album_image_orders as $album_image_id => $album_image_order) {
            $image = Image::findOrfail($album_image_id);
            $image->update(['order' => $album_image_order]);
        }


        // sync product category
        $product_category_ids[] = intval($request->input('product_category_id'));
        $product->categories()->sync($product_category_ids);

        // sync tag
        $tags = $request->input('tags',[]);
        $tags = Tag::getTagIdByName($tags);
        $product->tags()->sync($tags);

        //update option product
        ProductOptionValue::where('product_id',$id)->delete();
        $this->createOptionValue($request, $product->id);
        //luu attribute
        if(isset($attributes))
        {
            $product->attributes_set($product->id, $attributes);
        }
        return $this->redirectTo();
    }

    public function updates(Request $request)
    {

        $id = $request->input('pk');
        $value = $request->input('value');

        Product::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $data = [
            'page_title'    => 'Thông tin sản phẩm: ' . $product->title,
            'product' => $product
        ];

        return view('product::product.show',$data);
    }

    public function destroy(Request $request)
    {

        if($request->has('delete_image')) {
            $image_id = $request->input('id');

            $this->image_album->deleteImage($image_id, $this->album_images_config);

            return 1;
        }

        Product::destroy($request->input('id'));

        return $this->redirectTo();
    }

    public function createOptionValue($request, $product_id)
    {
        $category_root = ProductCategory::getParentRoot($request->input('product_category_id'));
        $product_option = ProductOption::getListOptionChind($category_root->id);
        foreach ($product_option as $option) {
            $option_input=array();
            $option_input['value'] = $request->input('option_'.$option->id);
            $option_input['product_id'] = $product_id;
            $option_input['product_option_id'] = $option->id;
            ProductOptionValue::create($option_input);
        }
    }

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     * @return int
     */
    public function toggleState(Request $request)
    {
        $product_id = $request->input('id');
        $product = Product::findOrFail($product_id);
        $property = $request->input('property', null);
        if ($product->$property == 1 || $product->$property == 0) {
            if ($product->$property == 1) {
                $product->$property = 0;
            } else {
                $product->$property = 1;
            }
            $product->save();
            return $product->$property;
        } else {
            abort(422);
        }
    }

    /**
     * Lay thuoc tinh rieng cua san pham
     */
    public function get_option_product(Request $request)
    {
        $option_name  = $request->input('option_name');

        $option_value = $request->input('option_value');

        $option_products = array();
        if(is_array($option_name) && is_array($option_value))
        {
            foreach ($option_name as $k => $v)
            {
                if(isset($v) && $v != '' && (isset($option_value[$k]) && $option_value[$k]!= ''))
                {
                    $option_products[$v] =  $option_value[$k];
                }
            }
        }
        return $option_products;
    }

    public function product_get_attributes($category_id, $attributes)
    {

        $category_id = (is_numeric($category_id)) ? $category_id : 0;
        $category    = ProductCategory::findOrFail($category_id);
        if(!$category)
        {
            return array();
        }

        $listAttribute = $category->attributes()->get();

        $attributes_products = array();
        $quantity = 0;

        foreach ($listAttribute as $row)
        {

            if(isset($attributes[$row->id]))
            {
                $attributes_value_name     = @$attributes[$row->id]['attributes_value_name'];
                $attributes_value_quantity = @$attributes[$row->id]['attributes_value_quantity'];
//                $attributes_value_amount_prefix = @$attributes[$row->id]['attributes_value_amount_prefix'];
                $attributes_value_amount = @$attributes[$row->id]['attributes_value_amount'];

                $option_products = array();
                $attr = array();
                if(is_array($attributes_value_name) && is_array($attributes_value_quantity) && is_array($attributes_value_amount))
                {
                    foreach ($attributes_value_name as $k => $v)
                    {
                        if(isset($v) && $v != '' && (isset($attributes_value_quantity[$k])))
                        {
                            $option_products['name'] =  $v;
                            $option_products['quantity'] =  $attributes_value_quantity[$k];
//                            $option_products['amount_prefix'] = $attributes_value_amount_prefix[$k];
                            $option_products['amount'] =  $attributes_value_amount[$k];
                            $attr[] = $option_products;
                            $quantity += $option_products['quantity'];
                        }
                    }
                }

                $attributes_products[$row->id]['attributes'] = $attr;
                $attributes_products[$row->id]['quantity'] = $quantity;
                if(empty($attr))
                {
                    unset($attributes_products[$row->id]);
                }
            }
        }

        return $attributes_products;
    }

    public function find(Request $request)
    {
        $category_id = $request->input('category_id');

        if($category_id != 0 ){
            $product_category = ProductCategory::findOrFail($category_id);
            $products = $product_category->childProducts();
        }else{
            $products = Product::orderBy('order', 'desc')->get();
        }

        return view('product::product.product', ['products' => $products]);

    }



}