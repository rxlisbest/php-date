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
        if (ctype_digit($string)) {
            if($string <= 2147483647){
                if(PHP_INT_SIZE==4 && PHP_INT_MAX<>9223372036854775807)  throw new \Exception('Illegal parameter format');
            }
            $timestamp = $string;
        } else {
            $timestamp = strtotime($string);
            if ($timestamp === false) {
                throw new \Exception('Illegal parameter format');
            }
        }
        return $timestamp;
    }
}
