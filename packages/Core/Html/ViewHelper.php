<?php

namespace Core\Html;

class ViewHelper
{
    /**
     * The HTML builder instance.
     *
     * @var \Core\Html\HtmlBuilder $html
     */
    protected $html;

    public function __construct($html)
    {
        $this->html = $html;
    }

    public function button($label = null, $link = null, $type = null, $options = [])
    {
        // Get button label
        if($type == 'icon') {
            $label = '';
        }
        else {
            $label = is_null($label) ? '' : $label;
        }

        // Default button type is link
        if(is_null($type)) $type = 'link';

        // Get font icon
        if(isset($options['icon'])) {
            $icon = '<i class="'. $options['icon'] .'"></i>';
            unset($options['icon']);
        }
        else {
            $icon = '';
        }

        // Get color class
        $color = isset($options['color']) ? $options['color'] : ' default';

        // Get button size
        $button_size = isset($options['size']) ? $options['size'] : ' sm';

        // Button class
        if($type == 'icon') {
            $button_class = '';
        }
        else {
            $button_class = " btn btn-{$button_size} {$color} ";
            if(isset($options['button'])) {
                $button_class .= "btn-{$options['button']}";
            }
        }

        $options = array_merge_recursive($options, ['class' => $button_class]);

        // Attributes
        $attributes = $this->html->attributes($options);

        switch($type) {
            case 'link':
                $link = is_null($link) ? 'javascript:;' : $link;
                return '<a href="'. $link .'" '. $attributes .'>'. $label . $icon .'</a>';
            case 'icon':
                $link = is_null($link) ? 'javascript:;' : $link;
                return '<a href="'. $link .'" '. $attributes .'>'. $icon .'</a>';
            case 'button':

        }
    }

    public function badge($label, $link = null)
    {
        $badge = '<span class="badge badge-primary badge-roundless"> '. $label .' </span>';

        if(empty($link)) {
            return $badge;
        }

        return '<a href="'. $link .'">'. $badge . '</a>';
    }

}