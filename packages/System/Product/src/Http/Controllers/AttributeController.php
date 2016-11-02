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
use System\Product\Http\Requests\AttributeRequest;
use System\Product\Http\Requests\ProductRequest;
use System\Product\Model\Attribute;
use System\Product\Model\AttributeValue;
use System\Product\Model\Product;
use System\Product\Model\ProductAttribute;
use System\Product\Model\ProductCategory;
use Auth;


class AttributeController extends ProductBaseController
{

   
    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        $attributes = Attribute::all();
        $data = [

            'page_title'        => 'Danh sách ảnh tùy chọn',
            'attributes'       => $attributes
        ];

        return view('product::attribute.index', $data);
    }

    public function create()
    {

        $categories_array = ProductCategory::recursiveLists(null, null, '&#9480;&#9480;');

        $data = [
            'page_title'     => 'Thêm tùy chọn mới',
            'category_lists' => $categories_array
        ];

        return view('product::attribute.create', $data);
    }

    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AttributeRequest $request)
    {
        $inputs = $request->all();

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('attributes');
        }
        //create attribute
        $attribute = Attribute::create($inputs);

        // Attach attribute category
        $product_category_id = $request->input('product_category_id');
        $attribute->categories()->attach($product_category_id);

        //attribute value
        $this->get_attribute_value($request, $attribute->id);

        flash()->success('Tạo trang mới thành công');

        return $this->redirectTo();
    }

    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        $categories_array = ProductCategory::recursiveLists(null, null, '&#9480;&#9480;');


        $data = [
            'page_title'     => 'Sửa tùy chọn',
            'attribute'           => $attribute,
            'category_lists' => $categories_array
        ];
        return view('product::attribute.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $attribute = Attribute::findOrFail($id);

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('attributes');
        }


        $attribute->update($inputs);

        // Attach attribute category
        $product_category_id = $request->input('product_category_id');
        $attribute->categories()->sync($product_category_id);

        //attribute value
        AttributeValue::where('attribute_id',$id)->delete();
        $this->get_attribute_value($request, $id);

        flash()->success('Cập nhật trang thành công');

        return $this->redirectTo();
    }

    /**
     * Lay tuy chon cua san pham
     */
    public function get_attribute_value(Request $request,$attribute_id)
    {
        $attributes_value  = $request->input('attributes_value');

        $attributes_order = $request->input('attributes_order');

        $attributes_products = array();
        if(is_array($attributes_value) && is_array($attributes_order))
        {
            foreach ($attributes_value as $k => $v)
            {
                if(isset($v) && $v != '')
                {
                    $attributes_products[] = array('name' => $v, 'order' => $attributes_order[$k]);
                }
            }
        }

        foreach ($attributes_products as $key=>$attribute_value) {
            $attribute_value['attribute_id'] = $attribute_id;
            AttributeValue::create($attribute_value);
        }

    }


    public function destroy(Request $request)
    {

        Attribute::destroy($request->input('id'));
        if($request->ajax()) {
            return 1;
        }

    }

    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        Attribute::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    public function toggleState(Request $request)
    {

        $attribute_id = $request->input('id');
        $attribute = Attribute::findOrFail($attribute_id);

        $property = $request->input('property', null);

        if ($attribute->$property == 1 || $attribute->$property == 0) {
            if ($attribute->$property == 1) {
                $attribute->$property = 0;
            } else {
                $attribute->$property = 1;
            }
            $attribute->save();

            return $attribute->$property;
        } else {
            abort(422);
        }
    }

    public function get_value(Request $request)
    {

        $category_id = $request->category_id;
        $category_id = (is_numeric($category_id)) ? $category_id : 0;
        $productCategory = ProductCategory::findOrFail($category_id);
        $attributes = $productCategory->attributes()->get();

        return view('product::attribute.get-value',['attributes' => $attributes,'product_id'=>$request->product_id]);
    }


}