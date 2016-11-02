<?php

namespace Core\Html;


use Illuminate\Support\Facades\Facade;

class FormHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'form_helper';
    }
}