<?php

namespace Core\Recursive;


class Recursive
{
    /**
     * Recursive list with name indented
     *
     * @param $lists
     * @param null $root
     * @param null $prefix
     * @param int $level
     * @return array
     */
    public static function nameIndent($lists, $root = null, $prefix = null, $level = 0)
    {
        $prefix = empty($prefix) ? '&nbsp;&nbsp;&nbsp;' : $prefix;
        $items = [];
        foreach ($lists as $item)
            if ($item['parent_id'] == $root) {{
                $items[$item['id']] = str_repeat($prefix, $level) . ' ' . $item['name'];

                $items = $items + self::nameIndent($lists, $item['id'], $prefix, $level + 1);
            }
        }

        return $items;
    }

    public static function selectList($lists, $optional = null, $exclude = null, $prefix = null, $root = null )
    {
        $select_lists = self::nameIndent($lists, $root, $prefix, 0);

        if(!empty($optional) && is_array($optional)) {
            $select_lists = $optional + $select_lists;
        }

        return $select_lists;
    }

    public static function getParentRoot($lists,$child)
    {
        foreach ($lists as $item)
            if ($item->id == $child) {
                $child = $item->parent_id;
                if($child == null){
                    return $item;
                }
                self::getParentRoot($lists,$child);
            }
    }

    public static function root($lists, $id)
    {
        foreach($lists as $item) {
            if($item->id == $id) {
                if(is_null($item->parent_id)) {
                    return $item;
                }
                else {
                    return self::root($lists, $item->parent_id);
                }
            }
        }
    }

    /**
     * Find all child id
     *
     * @param $lists
     * @param null $root
     * @param bool $include_root
     * @return array
     */
    public static function allChildId($lists, $root = null, $include_root = false)
    {
        if(is_object($lists)) {
            $items = [];
            foreach($lists as $item) {
                if($item->parent_id == $root) {
                    $items[] = $item->id;

                    $items = array_merge($items, self::allChildId($lists, $item->id));
                }
            }

            if($include_root) {
                $items[] = intval($root);
                return $items;
            }
            return $items;
        }

        if(is_array($lists)) {
            $items = [];
            foreach($lists as $key => $id) {

            }
        }
    }
	//tแบกo menu category
    public static function cmsMenuBuilder($categoryArr, $parent_id = null, $level = 0)
    {
        $menu_string = '';
        foreach( $categoryArr as $menu ) {
            if( $menu->parent_id == $parent_id && $level < 2) {
                $menu_string .= '<li><a href=" '. $menu->getViewLink() .' ">'. $menu->name .'</a>';
                $menu_string .=  self::cmsMenuBuilder($categoryArr, $menu->id, $level + 1);
                $menu_string .= '</li>';
            }
        }

        $menu_string = '<ul>'. $menu_string .'</ul>';

        return empty($menu_string) ? '' : $menu_string;
    }


}