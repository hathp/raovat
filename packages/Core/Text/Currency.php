<?php


namespace Core\Text;


class Currency
{

    /**
     * Xu ly tien dau vao
     * @param float $amount 	So tien
     * @param bool 	$natural	Co chuyen amount ve so nguyen duong hay khong
     */

    public static function currency_handle_input($amount, $natural = FALSE)
    {
        $amount = str_replace(',', '', $amount);
        $amount = floatval($amount);

        if ($natural)
        {
            $amount = max(0, $amount);
        }

        return $amount;
    }
}