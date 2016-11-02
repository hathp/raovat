<?php

namespace System\Product\Model;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    /**
     * Passing an array tag name and return array id
     *
     * @param $array_tag_name
     * @return array
     */
    public static function getTagIdByName($array_tag_name)
    {

        $array_tag_name = explode(",",$array_tag_name);

        if(is_array($array_tag_name)) {
            $array_id = [];
            foreach($array_tag_name as $tag_name) {
                $tag = self::where('name', $tag_name)->first();

                if(empty($tag)) {
                    $tag = self::create(['name' => $tag_name]);

                }
                $array_id[] = $tag->id;
            }

            return $array_id;
        }
    }

    /**
     * A Tag can belongs to many post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }


}