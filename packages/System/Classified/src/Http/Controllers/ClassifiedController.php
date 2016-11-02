<?php


namespace System\Classified\Http\Controllers;

use Core\Upload\V2\Upload;
use Front\Model\Province;
use Illuminate\Http\Request;
use System\Classified\Http\Requests\ClassifiedRequest;
use System\Classified\Model\Classified;
use System\Classified\Model\ClassifiedCategory;
use System\Classified\Services\ClassifiedService;
use System\Classified\Support\Toggle;
use System\Setting\Model\Country;
use System\Setting\Model\Language;

class ClassifiedController extends BaseController
{
    use Toggle;
    protected $class_toggle = Classified::class;
    protected $upload;

    public function __construct(Upload $upload)
    {
        parent::__construct();
        $classified_categories = ClassifiedCategory::whereNull('parent_id')->get();
        $provinces = Province::orderBy('name', 'asc')->get()->lists('name', 'id');
        $this->upload = $upload;

        view()->share('classified_categories', $classified_categories);
        view()->share('provinces', $provinces);
        view()->share('country_list', Country::lists('name','id')->toArray());

    }

    public function index()
    {

        $classifieds = Classified::all();

        if(!empty(\Request::input('country'))) {
            $classifieds = Classified::where('country_id',(\Request::input('country')))->get();
        }

        if(!empty(\Request::input('category'))) {
            $classifieds_category = ClassifiedCategory::findOrFail(\Request::input('category'));
            $classifieds = $classifieds_category->classifieds;
        }

        $categories = ClassifiedCategory::all();
        $page_title = 'Tin rao vặt';

        $data = compact('classifieds', 'categories', 'page_title');

        return view(self::PACKAGE_NAME. '::classified.index', $data);
    }

    public function show($classifieds_id)
    {
        $classifieds = Classified::findOrFail($classifieds_id);

        $data = [
            'page_title' => $classifieds->name,
            'classifieds' => $classifieds
        ];

        return view(self::PACKAGE_NAME. '::classified.show', $data);
    }

    public function create()
    {
        $data = [
            'lang_list'          => Language::lists('name','id')->toArray(),
//            'country_list'       => Country::lists('name','id')->toArray(),
            'pack_title' => 'Tạo tin rao vặt'
        ];

        return view(self::PACKAGE_NAME. '::classified.create', $data);
    }

    public function store(ClassifiedRequest $request)
    {
        ClassifiedService::create($request);

        return $this->redirectTo();
    }

    public function edit($classified_id)
    {
        $classifieds = Classified::findOrFail($classified_id);

        $data = [
            'lang_list'          => Language::lists('name','id')->toArray(),
//            'country_list'       => Country::lists('name','id')->toArray(),
            'page_title' => 'Sửa tin rao vặt',
            'classifieds' => $classifieds,
        ];

        return view(self::PACKAGE_NAME. '::classified.edit', $data);
    }

    public function update($classified_id, ClassifiedRequest $request)
    {
        $classifieds = Classified::findOrFail($classified_id);

        ClassifiedService::edit($request, $classifieds);

        return $this->redirectTo();
    }

    public function destroy(Request $request)
    {
        ClassifiedService::destroy($request);
    }
}