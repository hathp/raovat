<?php


namespace Core\Query;


class Query
{
    public static function getMaxFieldValue($table, $field = 'order')
    {
        $max = \DB::table($table)->max($field);

        return is_null($max) ? 1 : ($max + 1);
    }

    public static function changeBooleanStateField($table, $field)
    {

    }

}