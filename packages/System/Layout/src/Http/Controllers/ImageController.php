<?php


namespace System\Layout\Http\Controllers;

use Core\Query\Query;
use Core\Route\Route;
use Core\Upload\V2\Upload;
use Hoster\Model\Image\Image;
use Hoster\Model\Image\ImageAlbum;
use Illuminate\Http\Request;

class ImageController extends LayoutBaseController
{

    protected $image_config;
    protected $image_album_slug;

    public function __construct(Upload $upload)
    {
        $this->upload = $upload;

        $this->image_album_slug = Route::parseUri(1);
        $this->image_config = config('layout-image.image_layout');
    }
   
    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $image_album = ImageAlbum::where('slug', $this->image_album_slug)->first();

        $ajax_toggle_link = route("admin.$this->image_album_slug.toggle");
        $ajax_delete_link = route("admin.$this->image_album_slug.destroy");

        $data = [
            'page_title'        => 'Danh sách ảnh '.$image_album->name,
           
            'images'            => $image_album->images()->get(),

            'ajax_toggle_link' => $ajax_toggle_link,

            'ajax_delete_link' => $ajax_delete_link,

            'image_album_slug'  => $this->image_album_slug
        ];

        return view('layout::image.index', $data);
    }

    public function create()
    {

        $store_image_link = route("admin.$this->image_album_slug.store");
        $data = [
            'page_title'     => 'Thêm hình ảnh mới',
            'store_link'     => $store_image_link
        ];

        return view('layout::image.create', $data);
    }

    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $image_album = ImageAlbum::where('slug', $this->image_album_slug)->first();

        $inputs = $request->except('path');

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('images');
        }

        if($this->image_album_slug == 'banner') {
            $config = config('layout-image.logo');
        }
        else {
            $config = $this->image_config;
        }

        $image_path = $this->upload->images($request->file('path'), $config);
        $inputs['path'] = $image_path;

        $inputs['image_album_id'] = $image_album->id;

        Image::create($inputs);

        flash()->success('Tạo trang mới thành công');

        return $this->redirectTo();
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);

        $update_link = route("admin.$this->image_album_slug.update", $image->id);

        $data = [
            'page_title'     => 'Sửa hình ảnh',
            'image'           => $image,
            'update_link'    => $update_link,
        ];
        return view('layout::image.edit', $data);
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
        $image = Image::findOrFail($id);

        $inputs = $request->except('path');

        if ($request->hasFile('path')) {
            $image->deleteLayoutImage();

            if($this->image_album_slug == 'banner') {
                $config = config('layout-image.logo');
            }
            else {
                $config = $this->image_config;
            }

            $image_path = $this->upload->images($request->file('path'), $config);
            $inputs['path'] = $image_path;
        }

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('images');
        }

        $image->update($inputs);

        flash()->success('Cập nhật trang thành công');

        return $this->redirectTo();
    }

    public function destroy(Request $request)
    {
        $image = Image::findOrFail($request->input('id'));
        $image->deleteLayoutImage();
        $image->delete();
        if($request->ajax()) {
            return 1;
        }
        else {
            return $this->redirectTo();
        }
    }

    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        Image::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    public function toggleState(Request $request)
    {
        $image_id = $request->input('id');
        $image = Image::findOrFail($image_id);

        $property = $request->input('property', null);

        if ($image->$property == 1 || $image->$property == 0) {
            if ($image->$property == 1) {
                $image->$property = 0;
            } else {
                $image->$property = 1;
            }
            $image->save();

            return $image->$property;
        } else {
            abort(422);
        }
    }


}