<?php


namespace System\Contact\Http\Controllers;

use Illuminate\Http\Request;
use System\Contact\Model\Contact;
use System\Contact\Http\Requests\ContactRequest;


class ContactController extends ContactBaseController
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
            'page_title'      => 'Danh sách liên hệ',
           
            'contacts' => Contact::all()
        ];

        return view('contact::contact.index', $data);
    }

    /**
     * Store a new product category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $data = [
            'page_title'    => 'Sửa thông tin liên hệ',
            'contact'   => $contact,
        ];
        return view('contact::contact.edit', $data);
    }

    /**
     * Update an product category
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ContactRequest $request)
    {
        $contact = Contact::findOrFail($id);

        $contact->update($request->all());

        flash()->success('Cập nhật thành công');

        return $this->redirectTo();
    }


    public function destroy(Request $request)
    {
        Contact::destroy($request->input('id'));
    }


}