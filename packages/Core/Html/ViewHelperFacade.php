<?php


namespace Core\Html;


use Illuminate\Support\Facades\Facade;

class ViewHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'view_helper';
    }
}