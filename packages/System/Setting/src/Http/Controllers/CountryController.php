<?php

namespace System\Setting\Http\Controllers;

use Illuminate\Http\Request;
use System\Setting\Model\Country;
use System\Setting\Http\Requests\countryRequest;
use Hoster\Http\Controllers\Admin\AdminBaseController;
use Core\Query\Query;

class CountryController extends AdminBaseController
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
            'page_title'      => 'Danh sách quốc gia',
           
            'countrys' => Country::all()
        ];

        return view('hoster-config::country.index', $data);
    }

    public function create()
    {

        $data = [
            'page_title'     => 'Thêm quốc gia mới',
        ];

        return view('hoster-config::country.create');
    }

    public function store(CountryRequest $request)
    {
        $inputs = $request->all();
        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('countries');
        }

        Country::create($inputs);

        flash()->success('Tạo quốc gia mới thành công');

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

        $country = Country::findOrFail($id);

        $data = [
            'page_title'    => 'Sửa thông tin quốc gia',
            'country'   => $country,
        ];

        return view('hoster-config::country.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CountryRequest $request)
    {
        $country = Country::findOrFail($id);

        $country->update($request->all());

        flash()->success('Cập nhật quốc gia thành công');

        return $this->redirectTo();
    }

    public function destroy(Request $request)
    {
        Country::destroy($request->input('id'));
    }
    public function toggleState(Request $request)
    {

        $lang_id = $request->input('id');

        $country = Country::findOrFail($lang_id);

        $property = $request->input('property', null);

        if ($country->$property == 1 || $country->$property == 0) {
            if ($country->$property == 1) {
                $country->$property = 0;
            } else {
                $country->$property = 1;
            }
            $country->save();

            return $country->$property;
        } else {
            abort(422);
        }
    }
    public function updates(Request $request)
    {

        $id = $request->input('pk');
        $value = $request->input('value');

        Country::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

}