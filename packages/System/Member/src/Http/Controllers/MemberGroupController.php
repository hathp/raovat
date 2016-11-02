<?php


namespace System\Member\Http\Controllers;


use Core\Query\Query;
use Illuminate\Http\Request;
use System\Member\Http\Requests\MemberGroupRequest;
use System\Member\Model\MemberGroup;
use System\Page\Http\Requests\PageCategoryRequest;


class MemberGroupController extends MemberBaseController
{

    public function index()
    {


        $data = [
            'page_title'         => 'Nhóm thành viên',
            'memberGroups'        => MemberGroup::all(),
        ];

        return view('member::group.index', $data);
    }

    public function create()
    {


        $data = [
            'page_title'         => 'Nhóm thành viên',

        ];

        return view('member::group.create', $data);
    }

    /**
     * Store a new page category
     *
     * @param Request|PageCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MemberGroupRequest $request)
    {
        $inputs = $request->all();
        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('member_groups');
        }
        MemberGroup::create($inputs);
        flash()->success('Thêm nhóm thành viên thành công');
        return $this->redirectTo();
    }

    /**
     * Show an article
     *
     * @param $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $member_group = MemberGroup::findOrFail($id);

        $data = [
            'page_title'    => 'Thông tin nhóm: ' . $member_group->name,
            'member_group' => $member_group
        ];

        return view('member::group.show', $data);
    }


    /**
     * Show edit category form
     *
     * @param $page_category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // find page category
        $member_group = MemberGroup::findOrFail($id);

        $data = [
            'page_title'    => 'Sửa nhóm thành viên',
            'member_group' => $member_group
        ];

        return view('member::group.edit', $data);
    }

    /**
     * Update a category
     *
     * @param $id
     * @param PageCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update($id, MemberGroupRequest $request)
    {
        $member_group = MemberGroup::findOrFail($id);

        $inputs = $request->all();
        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('member_groups');
        }
        $member_group->update($inputs);
        flash()->success('Sửa nhóm thành viên thành công');
        return $this->redirectTo();
    }

    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        MemberGroup::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    /**
     * delete category and any sub-category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|int
     */
    public function destroy(Request $request)
    {
        $member_group = MemberGroup::findOrFail($request->input('id'));
        $member_group->delete();
        flash()->success('Xóa nhóm thành viên thành công');
    }

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     */
    public function toggleState(Request $request)
    {
        $id = $request->input('id');
        $member_group = MemberGroup::findOrFail($id);

        $property = $request->input('property', null);

        if ($member_group->$property == 1 || $member_group->$property == 0) {
            if ($member_group->$property == 1) {
                $member_group->$property = 0;
            } else {
                $member_group->$property = 1;
            }
            $member_group->save();

            return $member_group->$property;
        } else {
            abort(422);
        }
    }


}