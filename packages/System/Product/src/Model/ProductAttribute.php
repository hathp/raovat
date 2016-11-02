<?php


namespace System\Product\Model;


use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
        'value_id',
        'quantity',
        'amount',
        'count_buy',
        'amount_prefix',

    ];

}