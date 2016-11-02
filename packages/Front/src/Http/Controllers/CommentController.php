<?php
namespace Front\Http\Controllers;


use Core\Query\Query;
use Hoster\Http\Controllers\Controller;
use Illuminate\Http\Request;
use System\Comment\Model\Comment;
use Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $user = Auth::user();
        if(isset($user)){
            $post_inputs= $request->all();
            $post_inputs['user_name'] =  $user->name;
            $post_inputs['user_email'] =  $user->email;
            $post_inputs['user_id'] =  $user->id;
            $post_inputs['user_phone'] =  $user->phone;
            //order
            if(empty($post_inputs['order'])){
                $post_inputs['order'] =  Query::getMaxFieldValue('comments');
            }
            Comment::create($post_inputs);
            flash()->success('Bạn gửi bình luận thành công chúng tôi sẽ sớm phê duyệt bình luận của bạn');
            return redirect()->back();
        }else{
            flash()->warning('Bạn phải đăng nhập mới bình luận được bài viết');
            return redirect()->back();
        }

    }
}