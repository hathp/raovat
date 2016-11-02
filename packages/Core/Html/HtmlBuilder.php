<?php


namespace Core\Html;

class HtmlBuilder
{

    protected $url;

    /**
     * Convert an HTML string to entities.
     *
     * @param  string  $value
     * @return string
     */
    public function entities($value)
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Convert entities to HTML characters.
     *
     * @param  string  $value
     * @return string
     */
    public function decode($value)
    {
        return html_entity_decode($value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Generate a HTML link.
     *
     * @param  string  $url
     * @param  string  $title
     * @param  array   $attributes
     * @param  bool    $secure
     * @return string
     */
    public function link($url, $title = null, $attributes = array(), $secure = null)
    {
        $url = $this->url->to($url, array(), $secure);

        if (is_null($title) || $title === false) $title = $url;

        return '<a href="'.$url.'"'.$this->attributes($attributes).'>'.$this->entities($title).'</a>';
    }

    /**
     * Generate a link to a JavaScript file.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $secure
     * @return string
     */
    public function script($url, $attributes = array(), $secure = null)
    {
        $attributes['src'] = $this->url->asset($url, $secure);

        return '<script'.$this->attributes($attributes).'></script>'.PHP_EOL;
    }

    /**
     * Generate an HTML image element.
     *
     * @param  string  $url
     * @param  string  $alt
     * @param  array   $attributes
     * @param  bool    $secure
     * @return string
     */
    public function image($url, $alt = null, $attributes = array(), $secure = null)
    {
        $attributes['alt'] = $alt;

        return '<img src="'. asset($url, $secure).'"'.$this->attributes($attributes).'>';
    }

    /**
     * re-format array attributes
     *
     * @param array $options
     * @return array
     */
    public function arrayAttributes($options = [])
    {
        $attributes = [];
        if(is_array($options)) {
            foreach($options as $key => $value) {
                if(is_integer($key)) {
                    $attributes[$value] = $value;
                }
                else {
                    $attributes[$key] = $value;
                }
            }
        }

        return $attributes;
    }

    /**
     * Build an HTML attribute string from an array.
     *
     * @param  array  $attributes
     * @return string
     */
    public function attributes($attributes)
    {
        $html = array();

        // For numeric keys we will assume that the key and the value are the same
        // as this will convert HTML attributes such as "required" to a correct
        // form like required="required" instead of using incorrect numerics.
        foreach ((array) $attributes as $key => $value)
        {
            $element = $this->attributeElement($key, $value);

            if ( ! is_null($element)) $html[] = $element;
        }

        return count($html) > 0 ? ' '.implode(' ', $html) : '';
    }

    /**
     * Build a single attribute element.
     *
     * @param  string  $key
     * @param  string  $value
     * @return string
     */
    protected function attributeElement($key, $value)
    {
        if(is_array($value)) {
            $value = implode(" ", $value);
        }

        if (is_numeric($key)) $key = $value;

        if ( ! is_null($value)) return $key.'="'.e($value).'"';
    }

    public function div($options = [])
    {
        $attributes = $this->attributes($options);

        return '<div '. $attributes . '>';
    }
}