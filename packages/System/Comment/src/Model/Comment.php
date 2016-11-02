<?php

namespace System\Comment\Model;


use Core\Recursive\Recursive;
use Hoster\Model\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['user_name','user_email', 'message','parent_id','page_id','status','order','table','user_phone','user_id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function deleteLink()
    {
        return action('Admin\Page\CommentController@destroy', [$this->id]);
    }

    public static function childCategories($id, $include_root = false)
    {
        if(is_array($id)) {
            $ids = $id;
        }
        else {
            $ids[] = $id;
        }

        $array_ids = [];
        $all_category_collection = self::all();

        foreach($ids as $id) {
            $array_ids[] = Recursive::allChildId($all_category_collection, $id, $include_root);
        }

        $array_ids = array_values(array_unique(array_flatten($array_ids)));

        return $array_ids;
    }
}
