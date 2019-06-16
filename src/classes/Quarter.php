<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:11
 */

namespace Rxlisbest\PhpDate\Classes;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;
use Rxlisbest\PhpDate\PhpDate;
use Rxlisbest\PhpDate\PhpDateHelper;

class Quarter extends Base implements StandardInterface
{
    protected $season;

    public function __construct($string = 0)
    {
        parent::__construct($string);
    }

    public function today()
    {
        $this->outputTimestamp = $this->outputTimestamp;
        return $this->output();
    }

    public function begin()
    {
        $this->setSeason();
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), ($this->season * 3 - 3 + 1), 1, date('Y', $this->outputTimestamp))));
        return $this->output();
    }

    public function end()
    {
        $this->setSeason();
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $this->season * 3, date('t', mktime(0, 0, 0, $this->season * 3, 1, date('Y', $this->outputTimestamp))), date('Y', $this->outputTimestamp))));
        return $this->output();
    }

    protected function setSeason()
    {
        $this->season = ceil(date('m', $this->outputTimestamp) / 3);
    }

    public function last($number = 1)
    {
        $m = date('m', $this->outputTimestamp);
        $t = date('t', strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m - $number * 3, 1, date('Y', $this->outputTimestamp)))));
        $d = date('d', $this->outputTimestamp);
        if ($d > $t) {
            $d = $t;
        }

        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m - $number * 3, $d, date('Y', $this->outputTimestamp))));

        return $this;
    }

    public function next($number = 1)
    {
        $m = date('m', $this->outputTimestamp);
        $t = date('t', strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m + $number * 3, 1, date('Y', $this->outputTimestamp)))));
        $d = date('d', $this->outputTimestamp);
        if ($d > $t) {
            $d = $t;
        }

        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m + $number * 3, $d, date('Y', $this->outputTimestamp))));

        return $this;
    }

    public function diff($string)
    {
        $timestamp = PhpDateHelper::getTimestamp($string);
        if ($timestamp > $this->inputTimestamp) {
            $t1 = $timestamp;
            $t2 = $this->inputTimestamp;
        } else {
            $t1 = $this->inputTimestamp;
            $t2 = $timestamp;
        }

        $Y1 = date('Y', $t1);
        $m1 = date('m', $t1);
        $Y2 = date('Y', $t2);
        $m2 = date('m', $t2);
        $d = $Y1 * 12 + $m1 - $Y2 * 12 - $m2;

        $t = floor($d / 3);
        $r = $d % 3;

        $t3 = (new PhpDate($t2))->quarter->next($r)->type('timestamp')->today();
        $t3 = (new PhpDate($t3))->month->next($t)->type('timestamp')->begin();
        if ($t3 > (new PhpDate($t1))->quarter->type('timestamp')->begin()) {
            return $t + 1;
        }
        return $t;
    }
}