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
    protected $inputTimestamp;

    protected $format = 'Y-m-d';

    protected $type = 'string'; // string or timestamp

    protected $outputTimestamp;

    protected $classes = [
        'chineseWeek' => 'Rxlisbest\PhpDate\Classes\ChineseWeek'
    ];

    protected $class;

    public function __construct($string = 0)
    {
        $this->setInputTimestamp($string);
    }

    public function __call($method, $args)
    {
        if (!isset($this->classes[$method])) {
            throw new \Exception('Illegal parameter format');
        }
        if (!$this->class instanceof $this->classes[$method]) {
            $this->class = new $this->classes[$method]($this->inputTimestamp);
        }
        return $this->class;
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
        var_dump($this->inputTimestamp);
    }

    protected function output()
    {
        if ($this->type === 'string') {
            return date($this->format, $this->outputTimestamp);
        } else {
            return $this->outputTimestamp;
        }
    }
}