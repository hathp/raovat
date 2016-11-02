<?php


namespace System\Setting\Http\Controllers;

use Illuminate\Http\Request;
use System\Setting\Model\Language;
use System\Setting\Http\Requests\LanguageRequest;
use Hoster\Http\Controllers\Admin\AdminBaseController;
use Core\Query\Query;

class LanguageController extends AdminBaseController
{
   
    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $data = [
            'page_title'      => 'Danh sách ngôn ngữ',
           
            'languages' => Language::all()
        ];

        return view('hoster-config::language.index', $data);
    }

    public function create()
    {

        $data = [
            'page_title'     => 'Thêm ngôn ngữ mới',
        ];

        return view('hoster-config::language.create');
    }

    public function store(LanguageRequest $request)
    {
        $inputs = $request->all();
        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('languages');
        }

        Language::create($inputs);

        flash()->success('Tạo ngôn ngữ mới thành công');

        return $this->redirectTo();
    }

    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function edit($id)
    {

        $language = Language::findOrFail($id);

        $data = [
            'page_title'    => 'Sửa thông tin ngôn ngữ',
            'language'   => $language,
        ];

        return view('hoster-config::language.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, LanguageRequest $request)
    {
        $language = Language::findOrFail($id);

        $language->update($request->all());

        flash()->success('Cập nhật ngôn ngữ thành công');

        return $this->redirectTo();
    }

    public function destroy(Request $request)
    {
        Language::destroy($request->input('id'));
    }
    public function toggleState(Request $request)
    {

        $lang_id = $request->input('id');

        $language = Language::findOrFail($lang_id);

        $property = $request->input('property', null);

        if ($language->$property == 1 || $language->$property == 0) {
            if ($language->$property == 1) {
                $language->$property = 0;
            } else {
                $language->$property = 1;
            }
            $language->save();

            return $language->$property;
        } else {
            abort(422);
        }
    }
    public function updates(Request $request)
    {

        $id = $request->input('pk');
        $value = $request->input('value');

        Language::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

}