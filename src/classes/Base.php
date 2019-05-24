<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-21
 * Time: 22:10
 */

namespace Rxlisbest\PhpDate\Classes;

class Base
{
    protected $inputTimestamp; // input timestamp

    protected $format = 'Y-m-d';

    protected $type = 'string'; // string or timestamp

    protected $outputTimestamp; // output timestamp

    public function __construct($string = 0)
    {
        $this->setInputTimestamp($string);
    }

    public function format($format)
    {
        $this->format = $format;
        return $this;
    }

    public function type($type)
    {
        $this->type = $type;
        return $this;
    }

    protected function setInputTimestamp($string)
    {
        if ($string === 0) {
            $string = time();
        }
        if (ctype_digit($string) && $string <= 2147483647) {
            $this->inputTimestamp = $string;
        } else {
            $timestamp = strtotime($string);
            if ($timestamp === false) {
                throw new \Exception('Illegal parameter format');
            }
            $this->inputTimestamp = $timestamp;
        }
        $this->outputTimestamp = $this->inputTimestamp;
    }

    protected function output()
    {
        if ($this->type === 'string') {
            $output = date($this->format, $this->outputTimestamp);
        } else {
            $output = $this->outputTimestamp;
        }
        $this->outputTimestamp = $this->inputTimestamp;
        return $output;
    }
}