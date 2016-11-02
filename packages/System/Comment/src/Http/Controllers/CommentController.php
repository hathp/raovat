<?php

namespace System\Comment\Http\Controllers;

use Core\Query\Query;
use Core\Route\Route;
use Core\Upload\V2\Upload;
use Hoster\Model\Image\Image;
use Hoster\Model\Image\ImageAlbum;
use Illuminate\Http\Request;
use System\Comment\Model\Comment;


class CommentController extends CommentBaseController
{



    public function __construct()
    {
        $this->comment_table_slug = Route::parseUri(2);
        view()->share('comment_table_slug', $this->comment_table_slug);
    }
   
    /**
     * Listing all product category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $listComment = Comment::where('table', $this->comment_table_slug)->orderBy('id','desc')->get();

        $ajax_toggle_link = route("admin.comment.$this->comment_table_slug.toggle");
        $ajax_delete_link = route("admin.comment.$this->comment_table_slug.destroy");

        $data = [
            'page_title'        => 'Danh sách bình luận '.$this->comment_table_slug ,

            'ajax_toggle_link' => $ajax_toggle_link,

            'ajax_delete_link' => $ajax_delete_link,

            'listComment'      => $listComment,

        ];

        return view('comment::comment.index', $data);
    }



    public function destroy(Request $request)
    {

        $comments = Comment::childCategories($request->input('id'), true);

        Comment::destroy($comments);

        if($request->ajax()) {
            return 1;
        }
        else {
            return $this->redirectTo();
        }
    }

    public function updates(Request $request)
    {
        $id = $request->input('pk');
        $value = $request->input('value');

        Comment::where('id', $id)->update(['order' => $value]);

        return response(null, 200);
    }

    public function toggleState(Request $request)
    {

        $comment_id = $request->input('id');

        $comment = Comment::findOrFail($comment_id);

        $property = $request->input('property', null);

        if ($comment->$property == 1 || $comment->$property == 0) {
            if ($comment->$property == 1) {
                $comment->$property = 0;
            } else {
                $comment->$property = 1;
            }
            $comment->save();

            return $comment->$property;
        } else {
            abort(422);
        }
    }


}