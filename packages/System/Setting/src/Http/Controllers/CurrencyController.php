<?php

namespace System\Setting\Http\Controllers;

use Illuminate\Http\Request;
use System\Setting\Model\Currency;
use System\Setting\Http\Requests\CurrencyRequest;
use Hoster\Http\Controllers\Admin\AdminBaseController;
use Core\Query\Query;

class CurrencyController extends AdminBaseController
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
            'page_title'      => 'Danh sách tiền tệ',
           
            'currencies' => Currency::all()
        ];

        return view('hoster-config::currency.index', $data);
    }

    public function create()
    {

        $data = [
            'page_title'     => 'Thêm tiền tệ mới',
        ];

        return view('hoster-config::currency.create');
    }

    public function store(CurrencyRequest $request)
    {
        $inputs = $request->all();
        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('currencies');
        }

        Currency::create($inputs);

        flash()->success('Tạo tiền tệ mới thành công');

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

        $currency = Currency::findOrFail($id);

        $data = [
            'page_title'    => 'Sửa thông tin tiền tệ',
            'currency'   => $currency,
        ];

        return view('hoster-config::currency.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CurrencyRequest $request)
    {
        $currency = Currency::findOrFail($id);

        $currency->update($request->all());

        flash()->success('Cập nhật tiền tệ thành công');

        return $this->redirectTo();
    }

    public function destroy(Request $request)
    {
        Currency::destroy($request->input('id'));
    }
    public function toggleState(Request $request)
    {

        $lang_id = $request->input('id');

        $currency = Currency::findOrFail($lang_id);

        $property = $request->input('property', null);

        if ($currency->$property == 1 || $currency->$property == 0) {
            if ($currency->$property == 1) {
                $currency->$property = 0;
            } else {
                $currency->$property = 1;
            }
            $currency->save();

            return $currency->$property;
        } else {
            abort(422);
        }
    }
    public function updates(Request $request)
    {

        $id = $request->input('pk');
        $value = $request->input('value');

        Currency::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }
	
	public function get_default($id)
    {
		
        $currency = Currency::findOrFail($id);

        $data = [
            'page_title'    => 'Gán giá trị tiền tệ mặc định',
            'currency'   	=> $currency,
        ];
		
        return view('hoster-config::currency.get_default', $data);
    }
	
	public function set_default($id)
    {
        $currency = Currency::findOrFail($id);
		
		$input['default'] = Query::getMaxFieldValue('currencies','default');
		$input['value'] =	1;
        $currency->update($input);

        flash()->success('Cập nhật tiền tệ thành công');

        return $this->redirectTo();
    }

}