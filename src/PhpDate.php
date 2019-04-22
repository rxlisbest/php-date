<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-21
 * Time: 22:10
 */

namespace Rxlisbest\PhpDate;

class PhpDate
{
    protected $timestamp;

    protected $format = 'Y-m-d H:i:s';

    public function __construct($string)
    {
        $this->setTimestamp($string);
    }

    protected function setTimestamp($string)
    {
        if (ctype_digit($string) && $string <= 2147483647) {
            $this->timestamp = $string;
        } else {
            $this->timestamp = strtotime($string);
        }
    }

    public function today() {
        return date($this->format, $this->timestamp);
    }

    public function format($format)
    {
        $this->format = $format;
        return $this;
    }
}