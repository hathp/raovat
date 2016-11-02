<?php
/**
 * User: Viet Trung
 * Date: 22/4/2016
 * Time: 4:21 PM
 */

namespace Front\Support;


class Recursive
{
    protected static $level = 0;
    protected static $max_level = 0;

    public static function category($lists, $root = null, $level = 1)
    {

        $categories_string = '';

        foreach($lists as $item) {
            if($item->parent_id == $root) {
                if($level == 1){
                    $categories_string = '<li class="dropdown men"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'
                        .'<img src="assets/front/images/1.png" class="i-desktop"><img src="assets/front/images/1-w.png" class="i-mb">'
                        . $item->name
                        .'</a>'. self::category($lists, $item->id, $level + 1) .'</li>';
                }
                else {

                }
            }
        }

        return $categories_string;
    }

    public static function setMaxLevel($max_level)
    {
        self::$max_level = $max_level;
    }
}