<?php


namespace System\Product\Http\Controllers;

use Core\Query\Query;
use Core\Text\Process;
use Core\Route\Route;
use Core\Upload\V2\Upload;
use Illuminate\Http\Request;
use System\Product\Model\Product;
use System\Product\Model\manufacture;
use System\Product\Http\Requests\manufactureRequest;
use System\Product\Model\ProductCategory;
use System\Setting\Model\Language;


class manufactureController extends ProductBaseController
{
    protected $upload;



    public function __construct(Upload $upload)
    {
        $this->upload = $upload;


    }
    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        $data = [
            'page_title'          => 'Hãng sản xuất',
            'manufactures'         => Manufacture::all()
        ];

        return view('product::manufacture.index', $data);
    }


    public function create()
    {

        $category_list = ProductCategory::recursiveLists();

        $data = [
            'page_title'    => 'thêm mới hãng sản xuất',
            'category_list'   => $category_list,
        ];

        return view('product::manufacture.create', $data);
    }
    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ManufactureRequest $request)
    {

        $inputs = $request->except('cover_image');

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('manufactures');
        }

        // Upload cover image
        $cover_image_path = $this->upload->images($request->file('cover_image'), config('product-image.manufacture_cover'));

        // Cover image path
        $inputs['cover_image'] = $cover_image_path;

        $manufacture = Manufacture::create($inputs);

        // Attach $manufacture category
        $product_category_id = $request->input('product_category_id');
        $manufacture->categories()->attach($product_category_id);

        return $this->redirectTo();
    }

    public function edit($id)
    {

        $manufacture = Manufacture::findOrFail($id);

        $category_list = ProductCategory::recursiveLists(null, ['0' => 'Trống'], null, $id);

        $data = [
            'page_title'    => 'Sửa hãng sản xuất',
            'manufacture' => $manufacture,
            'category_list'   => $category_list,
        ];

        return view('product::manufacture.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ManufactureRequest $request)
    {
        $manufacture = Manufacture::findOrFail($id);

        // Get update able filed
        $inputs = $request->except('cover_image');

        //order
        if(empty($inputs['order'])){
            $inputs['order'] =  Query::getMaxFieldValue('manufactures');
        }

        if ($request->hasFile('cover_image')) {
            // Upload cover image
            $manufacture->deleteFile();
            $cover_image_path = $this->upload->images($request->file('cover_image'), config('product-image.manufacture_cover'));
            // Cover image path
            $inputs['cover_image'] = $cover_image_path;
        }

        // Update $manufacture
        $manufacture->update($inputs);

        // Attach attribute category
        $product_category_id = $request->input('product_category_id');
        $manufacture->categories()->sync($product_category_id);

        return $this->redirectTo();
    }
    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        Manufacture::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }


    public function show($id)
    {
        $manufacture = Manufacture::findOrFail($id);

        $data = [
            'page_title'    => 'Thông tin nhóm: ' . $manufacture->name,
            'manufacture' => $manufacture
        ];

        return view('product::manufacture.show', $data);
    }


    public function destroy(Request $request)
    {

    }


    /**
     * Response for ajax change field state
     *
     * @param Request $request
     */
    public function toggleState(Request $request)
    {
        $_id = $request->input('id');
        $manufacture = Manufacture::findOrFail($_id);

        $property = $request->input('property', null);

        if ($manufacture->$property == 1 || $manufacture->$property == 0) {
            if ($manufacture->$property == 1) {
                $manufacture->$property = 0;
            } else {
                $manufacture->$property = 1;
            }
            $manufacture->save();

            return $manufacture->$property;
        } else {
            abort(422);
        }
    }

    public function get_manufac(Request $request)
    {
        $category_id = $request->category_id;
        $category_id = (is_numeric($category_id)) ? $category_id : 0;
        $productCategory = ProductCategory::findOrFail($category_id);
        $manufactures = $productCategory->manufactures()->get();
        $manufacture_id = 0;
        if($request->product_id != 0){
            $manufacture_id = Product::findOrFail($request->product_id)->manufacture_id;
        }
        return view('product::manufacture.get_manufac',['manufactures' => $manufactures,'manufacture_id'=>$manufacture_id]);
    }

}