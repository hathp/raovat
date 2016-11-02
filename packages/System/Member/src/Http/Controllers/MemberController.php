<?php


namespace System\Member\Http\Controllers;

use Core\File\File;
use Core\Query\Query;
use Core\Image\Album;

use Hoster\Model\User\User;
use Illuminate\Http\Request;
use Core\Text\Process;
use Core\Upload\V2\Upload;

use System\Member\Http\Requests\MemberRequest;
use System\Member\Model\Member;
use System\Member\Model\MemberGroup;
use System\Setting\Model\Language;

class MemberController extends MemberBaseController
{


    public function index()
    {
        $users = User::all();

        $data = [
            'page_title' => 'Danh sách thành viên',
            'users' => $users
        ];

        return view('member::member.index', $data);
    }

    public function create()
    {

        $data = [
            'page_title' => 'Thêm thành viên mới',
            'lang_list'          => Language::lists('name','id')->toArray(),
            'member_groups' => MemberGroup::lists('name','id'),
        ];

        return view('member::member.create', $data);
    }

    public function store(MemberRequest $request)
    {

        // Request required field
        $inputs = $request->except(['cover_image']);

        //order
        if(empty($inputs['order'])){
            $inputs['order'] = Query::getMaxFieldValue('members');
        }
      
        // Upload cover image
        $cover_image_path = $this->upload->images($request->file('cover_image'), $this->cover_image_config);

        // Cover image path
        $inputs['cover_image'] = $cover_image_path;
       
        Member::create($inputs);

		flash()->success('Thêm mới thành viên thành công');
		
        return $this->redirectTo();
    }
    public function edit($id)
    {
        $member = Member::findOrFail($id);

        $data = [
            'page_title'     => 'Sửa thành viên',
			
           // 'lang_list'          => Language::lists('name','id')->toArray(),
			
            'member'           => $member,
			
            'member_group' => MemberGroup::All()
        ];

        return view('member::member.edit', $data);
    }
	
    public function update($id, MemberRequest $request)
    {

        $member = member::findOrFail($id);
        // Request required field
        $post_inputs = $request->except(['cover_image']);        

        //order
        if(empty($post_inputs['order'])){
            $post_inputs['order'] =  Query::getMaxFieldValue('members');
        }
     

        if ($request->hasFile('cover_image')) {
            // Upload cover image
            $member->deleteFile();
            $cover_image_path = $this->upload->images($request->file('cover_image'), $this->cover_image_config);

            // Cover image path
            $post_inputs['cover_image'] = $cover_image_path;
        }
			

        // Update member_category
        $member->update($post_inputs);
		flash()->success('Thêm mới thành viên thành công');
        return $this->redirectTo();
    }

    public function updates(Request $request)
    {

        $id = $request->input('pk');
        $value = $request->input('value');

        Member::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        $data = [
            'page_title'    => 'Thông tin thành viên: ' . $member->name,
            'member' => $member
        ];

        return view('member::member.show',$data);
    }

    public function destroy(Request $request)
    {

       
        Member::destroy($request->input('id'));

        return $this->redirectTo();
    }

    

    /**
     * Response for ajax change field state
     *
     * @param Request $request
     * @return int
     */
    public function toggleState(Request $request)
    {
        $member_id = $request->input('id');
        $member = Member::findOrFail($member_id);
        $property = $request->input('property', null);
        if ($member->$property == 1 || $member->$property == 0) {
            if ($member->$property == 1) {
                $member->$property = 0;
            } else {
                $member->$property = 1;
            }
            $member->save();
            return $member->$property;
        } else {
            abort(422);
        }
    }


    public function find(Request $request)
    {
        $group_id = $request->input('category_id');

        if($group_id != 0 ){
            $member_group = Membergroup::findOrFail($group_id);
            $members = $member_group->members();
        }else{
            $members = Member::orderBy('order', 'desc')->get();
        }

        return view('member::member.member', ['members' => $members]);

    }



}