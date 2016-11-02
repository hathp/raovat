<?php

namespace System\Contact\Model;


use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','company','message' 
    ];

}