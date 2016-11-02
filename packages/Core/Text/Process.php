<?php

namespace Core\Text;


class Process
{
    public static function strToSlug($string)
    {
        $string = strtolower(self::vnStringFilter($string));
        $string = str_slug($string);

        return $string;

    }

    public static function vnStringFilter($string)
    {
        $unicode = [
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        ];

        foreach ($unicode as $nonUnicode => $uni) {
            $string = preg_replace("/($uni)/i", $nonUnicode, $string);
        }

        return $string;
    }

    public static function setNullArrayValueIfEmpty($array)
    {
        $array_processed = [];
        foreach($array as $key => $value) {
            if(is_string($value) && strlen($value) == 0) {
                $array_processed[$key] = null;
            }
            else {
                $array_processed[$key] = $value;
            }
        }

        return $array_processed;
    }

    public static function extractNumberOfWord($string, $number)
    {
        $array_string = explode(' ', $string);

        if($number < count($array_string)) {
            $array_string = array_slice($array_string, 0, $number);
        }

        return implode(' ', $array_string);
    }
}