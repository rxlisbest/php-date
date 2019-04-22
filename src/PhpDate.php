<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-21
 * Time: 22:10
 */

namespace Rxlisbest\PhpDate;

use Rxlisbest\PhpDate\Traits\Week;

class PhpDate
{
    use Week;

    protected $timestamp;

    protected $format = 'Y-m-d';

    public function __construct($string = 0)
    {
        $this->setTimestamp($string);
    }

    protected function setTimestamp($string)
    {
        if ($string === 0) {
            $string = time();
        }
        if (ctype_digit($string) && $string <= 2147483647) {
            $this->timestamp = $string;
        } else {
            $timestamp = strtotime($string);
            if ($timestamp === false) {
                throw new \Exception('Illegal parameter format');
            }
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