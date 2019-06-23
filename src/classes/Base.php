<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-21
 * Time: 22:10
 */

namespace Rxlisbest\PhpDate\Classes;

use Rxlisbest\PhpDate\PhpDateHelper;

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
        if ($string === '') {
            $string = time();
        }
        $this->outputTimestamp = $this->inputTimestamp = PhpDateHelper::getTimestamp($string);
    }

    protected function output()
    {
        $timestamp = strtotime(date($this->format, $this->outputTimestamp));
        if ($this->type === 'string') {
            $output = date($this->format, $timestamp);
        } else {
            $output = $timestamp;
        }
        $this->outputTimestamp = $this->inputTimestamp;
        return $output;
    }
}