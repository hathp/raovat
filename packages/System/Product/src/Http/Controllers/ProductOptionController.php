<?php

namespace System\Product\Http\Controllers;

use Core\Query\Query;
use Core\Recursive\Recursive;
use Illuminate\Http\Request;
use System\Product\Model\ProductCategory;
use System\Product\Http\Requests\ProductOptionRequest;
use System\Product\Model\ProductOption;
use System\Product\Model\Product;
use System\Setting\Model\Language;


class ProductOptionController extends ProductBaseController
{

    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $options_array = ProductOption::recursiveLists(null, null, '&#9480;&#9480;');

        $product_options = collect();

        foreach ($options_array as $option_id => $option_name) {
            $category = ProductOption::findOrFail($option_id);
            $category->name = $option_name;
            $product_options->push($category);
        }

        $data = [
            'page_title'      => 'Thuộc tính sản phẩm',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'category_list'   => ProductCategory::recursiveParent(['' => 'Chọn loại sản phẩm']),
            'product_options' => $product_options
        ];

        return view('product::option.index', $data);
    }

    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductOptionRequest $request)
    {

        $inputs = $request->all();

        if ($inputs['parent_id'] == '0') {
            $inputs['parent_id'] = null;
        }
        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('product_options');
        }

        ProductOption::create($inputs);

        return $this->redirectTo();
    }

    public function edit($product_option_id)
    {
        $product_option = ProductOption::findOrFail($product_option_id);

        $data = [
            'page_title'    => 'Sửa thuộc tính sản phẩm',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'category_list' => ProductCategory::recursiveParent(['' => 'Chọn loại sản phẩm']),
            'product_option'   => $product_option,
        ];
        return view('product::option.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ProductOptionRequest $request)
    {
        $product_option = ProductOption::findOrFail($id);

        // Get update able filed
        $inputs = $request->all();

        if(isset($inputs['parent_id'])){
            if ($inputs['parent_id'] == 0 ) {
                $inputs['parent_id'] = null;
            }
        }


        //order
        if(empty($inputs['order'])){
            $inputs['order'] =  Query::getMaxFieldValue('product_options');
        }
        if($product_option->parent_id == null) {
            //get all id chind
            $data =  $product_option->childProductOptions();
            foreach ($data as $value) {
                $value->update(['product_category_id' => $inputs['product_category_id']]);
            }
        }
        // Update product_category
        $product_option->update($inputs);

        return $this->redirectTo();
    }

    public function updates(Request $request)
    {

        $id = $request->input('pk');
        $value = $request->input('value');

        ProductOption::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    public function show($id)
    {
        dd('productOption');


    }

    public function destroy(Request $request)
    {

        $product_option_ids = $request->input('id');

        $product_option_ids = ProductOption::childCategories($product_option_ids, true);

        ProductOption::destroy($product_option_ids);

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

        $option_id = $request->input('id');

        $product_option = ProductOption::findOrFail($option_id);

        $property = $request->input('property', null);

        if ($product_option->$property == 1 || $product_option->$property == 0) {
            if ($product_option->$property == 1) {
                $product_option->$property = 0;
            } else {
                $product_option->$property = 1;
            }
            $product_option->save();

            return $product_option->$property;
        } else {
            abort(422);
        }
    }

    /**
     * Response for ajax change category
     *
     * @param Request $request
     */
    public function option(Request $request)
    {
        if(!isset($request->category_id))
        {}

        $listOption = ProductOption::where('product_category_id',$request->category_id)->whereNull('parent_id');

        if(isset($request->optionId)){

            $listOption = $listOption->where('id','<>',$request->optionId);

            $productOption = ProductOption::findOrFail($request->optionId);
            if($productOption->parent_id  == null  ){
                $listOption= $listOption->where('id',0);
            }
        }

        $listOption = $listOption->get()->toArray();



        return json_encode($listOption);

        exit();
    }

    public function get_option(Request $request)
    {
        $category_id = $request->category_id;
        $category_id = (is_numeric($category_id)) ? $category_id : 0;

        $category_root = ProductCategory::getParentRoot($category_id);

        $product_option = ProductOption::getListOptionRoot($category_root->id);

        foreach($product_option as $option){
            $option->option  = ProductOption::getListOption($option['id']);
            foreach ($option->option as $value) {
                if($request->product_id == 0 ){
                    $value->value ='';
                }else{
                    $product = Product::findOrFail($request->product_id);
                    $value->value =(!empty($product->optionValue($value->id))) ?  $product->optionValue($value->id)->value : '';
                }
            }
        }
        return view('product::option.get-option',['product_option' => $product_option]);

    }
}