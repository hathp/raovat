<?php

namespace System\Product\Model;


use Illuminate\Database\Eloquent\Model;


class ProductOptionValue extends Model
{
    protected $fillable = [
        'value', 'product_option_id', 'product_id',
    ];
}