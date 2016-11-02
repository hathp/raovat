<?php


namespace System\Layout\Model;


use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','company','message' 
    ];

}