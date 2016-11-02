<?php


namespace System\Product\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'name',
        'order'
    ];

}