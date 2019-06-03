<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-06-02
 * Time: 19:23
 */

namespace Rxlisbest\PhpDate;


class PhpDateHelper
{
    public static function getTimestamp($string)
    {
        if (ctype_digit($string) && $string <= 2147483647) {
            $timestamp = $string;
        } else {
            $timestamp = strtotime($string);
            if ($timestamp === false) {
                throw new \Exception('Illegal parameter format');
            }
        }
        return $timestamp;
    }

    public static function diff($date1, $date2)
    {
        $timestamp1 = self::getTimestamp($date1);
        $timestamp2 = self::getTimestamp($date2);
        $diff = abs($timestamp1 - $timestamp2);
    }
}