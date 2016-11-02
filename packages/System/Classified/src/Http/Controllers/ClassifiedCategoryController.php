<?php


namespace System\Classified\Http\Controllers;

use Core\Query\Query;
use Core\Recursive\Recursive;
use Core\Text\Process;
use Illuminate\Http\Request;
use System\Classified\Http\Requests\CategoryRequest;
use System\Classified\Model\ClassifiedCategory;
use System\Classified\Support\Toggle;

class ClassifiedCategoryController extends BaseController
{
    use Toggle;
    protected $class_toggle = ClassifiedCategory::class;

    public function index()
    {
        $classified_categories = ClassifiedCategory::all();
        $category_list = Recursive::selectList($classified_categories, [0 => 'Trống']);
        $classified_categories = Recursive::selectList($classified_categories, null, null, '&#9480;&#9480;');
        $page_title = 'Nhóm rao vặt';

        $category_collect = collect();
        foreach($classified_categories as $id => $name) {
            $category = ClassifiedCategory::findOrFail($id);
            $category->name = $name;
            $category_collect->push($category);
        }

        $classified_categories = $category_collect;

        $data = compact('classified_categories', 'page_title', 'category_list');

        return view(self::PACKAGE_NAME. '::category.index', $data);
    }

    public function show($category_id)
    {
        $classified_category = ClassifiedCategory::findOrFail($category_id);
        $page_title = $classified_category->name;

        $data = compact('classified_category', 'page_title');

        return view(self::PACKAGE_NAME. '::category.show', $data);
    }

    public function create()
    {
        $page_title = 'Tạo nhóm rap vặt mới';

        $data = compact('page_title');

        return view(self::PACKAGE_NAME. '::category.create', $data);
    }

    public function store(CategoryRequest $request)
    {
        $inputs = $request->all();
        $inputs['slug'] = Process::strToSlug($inputs['slug']);
        $inputs['image'] = ClassifiedCategory::uploadBanner($request->file('image'));
        $inputs['icon'] = ClassifiedCategory::uploadIcon($request->file('icon'));
        $inputs['order'] = Query::getMaxFieldValue('classified_categories');

        ClassifiedCategory::create(array_filter($inputs));

        flash()->success('Thêm nhóm mới thành công');
        return $this->redirectTo();
    }

    public function edit($category_id)
    {
        $classified_category = ClassifiedCategory::findOrFail($category_id);
        $category_list = Recursive::selectList(ClassifiedCategory::all(), [0 => 'Trống']);
        $page_title = "Sửa nhóm rao vặt";

        $data = compact('page_title', 'classified_category', 'category_list');

        return view(self::PACKAGE_NAME. '::category.edit', $data);
    }

    public function update($category_id, CategoryRequest $request)
    {
        $classified_category = ClassifiedCategory::findOrFail($category_id);

        $inputs = $request->except(['image', 'icon']);

        if($request->hasFile('image')) {
            $classified_category->updateImage($request->file('image'), 'banner');
        }

        if($request->hasFile('icon')) {
            $classified_category->updateImage($request->file('icon'), 'icon');
        }

        $classified_category->update(array_filter($inputs));

        flash()->success('Cập nhật nhóm thành công');
        return $this->redirectTo();
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        if(is_array($id)) {

        }
        else {
            $classifieds = ClassifiedCategory::findOrFail($id);
            if(count($classifieds->classifieds) || count($classifieds->child())) {
                return 2;
            }
            else {
                ClassifiedCategory::destroy($id);
                return 1;
            }
        }
    }
}