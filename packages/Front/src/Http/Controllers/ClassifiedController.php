<?php
/**
 * User: Viet Trung
 * Date: 21/4/2016
 * Time: 4:58 PM
 */

namespace Front\Http\Controllers;

use Auth;
use Core\Upload\V2\Upload;
use Front\Http\Requests\ClassifiedRequest;
use Front\Model\File;
use Front\Model\Province;
use Hoster\Model\Image\Image;
use Illuminate\Http\Request;
use System\Classified\Model\Classified;
use System\Classified\Model\ClassifiedCategory;
use System\Classified\Services\ClassifiedService;
use Illuminate\Cookie\CookieJar;
use System\Setting\Model\Country;

class ClassifiedController extends BaseController
{
    protected $upload;

    public function __construct(Upload $upload)
    {
        parent::__construct();
        $this->upload = $upload;

        view()->share('provinces', Province::orderBy('name', 'asc')->get());
        view()->share('countries', Country::orderBy('name', 'asc')->get());
        view()->share('classified_categories', ClassifiedCategory::whereNull('parent_id')->get());
    }

    public function show($slug)
    {

        $classifieds = Classified::where('slug', $slug)->first();

        if (!\Request::session()->has('classified')) {
            \Request::session()->push('classified', []);
        }

        $session = \Request::session()->get('classified');

        if (!in_array($classifieds->id, $session)) {
            $classifieds->view_counter = $classifieds->view_counter + 1;
            $classifieds->save();
            $session[] = $classifieds->id;
            \Request::session()->put('classified', $session);
        }
		
		$comments = $classifieds->comments->where('parent_id',0);
        foreach($comments as $comment){
            $comment->child = $classifieds->comments->where('parent_id',$comment->id);
        }

        $data = [
            'classifieds' => $classifieds,
            'page_title'  => $classifieds->name,
            'fb_title'    => $classifieds->name,
            'fb_image'    => asset($classifieds->getImage()),
			'comments'	  =>$comments
        ];

        return view(self::PACKAGE_NAME . '::classified.show', $data);
    }

    public function create()
    {
        \Session::forget('id_classified_edit');
        $data = [
            'page_title' => 'Đăng tin rao vặt',
            'imageList'    =>File::where('classified_id',$this->faceid())->get()
        ];
        if (Auth::check()) {
            $data['user'] = Auth::user();
        }

        return view(self::PACKAGE_NAME . '::classified.create', $data);
    }

    public function store(ClassifiedRequest $request)
    {

        $classifieds = ClassifiedService::create($request);
        //cap nhat file
        File::where('classified_id',$this->faceid())->update(['classified_id' => $classifieds->id]);
        //xóa session image id
        \Session::forget('classified_id');
        return redirect('/');
    }

    public function edit($classifieds_slug)
    {

        $classifieds = Classified::where('slug', $classifieds_slug)->first();
        session(['id_classified_edit' => $classifieds->id]);
        if (empty($classifieds)) {
            abort(404);
        }

        if (!\Auth::user()->hasClassifieds($classifieds)) {
            return redirect(route('front.user.classified'));
        }

        $data = [
            'classifieds' => $classifieds,
            'imageList'    =>$classifieds->files
        ];

        return view('front::classified.edit', $data);
    }

    public function update($classifieds_id, ClassifiedRequest $request)
    {
        $classifieds = Classified::findOrFail($classifieds_id);
        ClassifiedService::edit($request, $classifieds);
        File::where('classified_id',$this->faceid())->update(['classified_id' => $classifieds->id]);
        \Session::forget('classified_id');
        return redirect(route('front.user.classified'));
    }

    public function category($slug)
    {

        $category = ClassifiedCategory::where('slug', $slug)->first();

        if (empty($category) || empty($category->parent_id)) {
            abort(404);
        }

        $classifieds = $category->classifieds_countr()->paginate(10);

        $data = [
            'page_title'     => $category->name,
            'category'       => $category,
            'classifieds'    => $classifieds,
            'fb_url'         => route('front.classified.category', $category->slug),
            'fb_title'       => $category->name,
            'fb_description' => $category->meta_description,
            'fa_keyword'     => $category->meta_keyword,
            'fb_image'       => asset($category->getBanner())
        ];

        return view(self::PACKAGE_NAME . '::classified/category', $data);
    }

    public function destroy(Request $request, $classified_id)
    {
        $user = \Auth::user();
        $classified = Classified::findOrFail($classified_id);


        if ($user->hasClassifieds($classified)) {
            ClassifiedService::destroy($request, $classified_id);

            return 1;
        }

        return 0;
    }
    public function raty(Request $request)
    {

        // Lay thong tin
        $id = $request->classifieds_id;

        $id = (!is_numeric($id)) ? 0 : $id;
        $classifieds = Classified::findOrFail($id);
        if (!$classifieds)
        {
            exit();
        }

        //kiem tra xem khach da binh chon hay chua
        $raty = session('session_raty');

        $raty   = (!is_array($raty)) ? array() : $raty;
        $result = array();
        //nếu đã tồn tại id sản phẩm này trong session đánh giá
        if(isset($raty[$id]))
        {
            $result['msg'] = 'Bạn chỉ được đánh giá 1 lần cho bài viết này';
            $output        = json_encode($result);//trả về mã json
            return $output;
            exit();
        }

        //cap nhat trang thai da binh chon
        $raty[$id] = TRUE;
        session(['session_raty' => $raty]);

        $score = $request->classifieds_score;//lấy số điểm post lên từ trang ajax
        $data  = array();
        $data['rate_total'] = $classifieds->rate_total + $score;//tổng số điểm
        $data['rate_count'] = $classifieds->rate_count + 1;//tổng số lượt đánh giá
        $data['raty'] = number_format($data['rate_total'] / $data['rate_count'],1);//tổng số lượt đánh giá

        $classifieds->update($data);

        // Khai bao du lieu tra ve
        $result['complete'] = TRUE;
        $result['msg']      = 'Cám ơn bạn đã đánh giá cho sản phẩm này';
        $output             = json_encode($result);//trả về mã json
        return $output;
        exit();
    }

    public function cookies($id,CookieJar $cookieJar)
    {
        $id = (!is_numeric($id)) ? 0 : $id;
        $country = Country::findOrFail($id);
        if (!$country)
        {
            exit();
        }
        $cookieJar->queue(cookie('country', $id, 45000));
//        $value = \Cookie::get('country');
        return back();

    }

    //upload anh
    public function upload(Request $request)
    {

        if($request->hasFile('file')) {

            $inputs =array();

            $inputs['cover_image'] = $this->upload->images($request->file('file'), config('classifieds-image.classifieds_image'));

            $id_classified_edit = session('id_classified_edit');

            if(!$id_classified_edit){
                $inputs['classified_id'] = $this->faceid();
            }else{
                $inputs['classified_id'] = $id_classified_edit;
            }

            $file = File::create($inputs);

            $data['name'] = $file->cover_image;
            $data['imageurl'] = $file->getImage();
            $data['id'] = $file->id;
            $data['result'] = 'OK';
            return json_encode($data);

        }

    }
    /**
     * tao id ao
     *
     */
    public function faceid()
    {

        $image_album_id = session('image_album_id');

        if(!$image_album_id){

//            $string = random_int(1000000,9000000);

            $string = str_random(10);

            session(['image_album_id' => $string]);

            $image_album_id = session('image_album_id');

        }

        return  $image_album_id;

    }
    //xoa anh
    public function deleteFile(Request $request)
    {
        if ($request->id)
        {
            $file = File::findOrFail($request->id);
            $file->deleteCover();
            $file->delete();
            $result['complete'] = TRUE;
            $output             = json_encode($result);
            return $output;
            exit();
        }
    }

}