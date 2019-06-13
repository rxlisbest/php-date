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

class Year extends Base implements StandardInterface
{
    public function today()
    {
        $this->outputTimestamp = $this->outputTimestamp;
        return $this->output();
    }

    public function begin()
    {
        $this->outputTimestamp = strtotime(date('Y-01-01 H:i:s', $this->outputTimestamp));
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = strtotime(date('Y-12-31 H:i:s', $this->outputTimestamp));
        return $this->output();
    }

    public function last($number = 1)
    {
        $m = (int)date('m', $this->outputTimestamp);
        $t = (int)date('t', strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m, 1, date('Y', $this->outputTimestamp) - $number))));
        $d = (int)date('d', $this->outputTimestamp);
        if ($d > $t) {
            $d = $t;
        }

        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m, $d, date('Y', $this->outputTimestamp) - $number)));
        return $this;
    }

    public function next($number = 1)
    {
        $m = (int)date('m', $this->outputTimestamp);
        $t = (int)date('t', strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m, 1, date('Y', $this->outputTimestamp) + $number))));
        $d = (int)date('d', $this->outputTimestamp);
        if ($d > $t) {
            $d = $t;
        }

        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m, $d, date('Y', $this->outputTimestamp) + $number)));
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
        $Y2 = date('Y', $t2);
        $d = $Y1 - $Y2;

        $t3 = (new PhpDate($t2))->year->next($d)->type('timestamp')->today();
        if ($t3 > $t1) {
            return $d - 1;
        }
        return $d;
    }
}