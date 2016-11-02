<?php

namespace Core\Menu;

class MenuLoader
{
    public static function load($name, $menus)
    {
        $menu = \Menu::get($name);

        if( !empty($menu)) {
            foreach($menus as $menu_item) {
                $menu_label = '<span class="title"> '. $menu_item['label'] .'</span>';
                unset($menu_item['label']);

                $menu_icon = isset($menu_item['icon']) ? $menu_item['icon'] : 'icon-folder';
                $menu_icon = '<i class="'. $menu_icon .'"></i>';
                unset($menu_item['icon']);

                if(isset($menu_item['parent'])) {
                    $menu_parent = $menu_item['parent'];
                    unset($menu_item['parent']);

                    $options = ['class' => 'nav-item'] + $menu_item;

                    $menu->{$menu_parent}->add($menu_label, $options)->prepend($menu_icon);
                }
                else {
                    $menu_name = $menu_item['name'];
                    unset($menu_item['name']);

                    $options = ['class' => 'nav-item'] + $menu_item;

                    $menu->add($menu_label, $options)->prepend($menu_icon)->nickname($menu_name);
                    $menu->{$menu_name}->link->attr(['class' => 'nav-link nav-toggle']);
                }

            }
        }
    }
}