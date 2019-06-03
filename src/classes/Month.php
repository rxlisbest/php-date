<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:11
 */

namespace Rxlisbest\PhpDate\Classes;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;

class Month extends Base implements StandardInterface
{
    public function today()
    {
        $this->outputTimestamp = $this->outputTimestamp;
        return $this->output();
    }

    public function begin()
    {
        $this->outputTimestamp = strtotime(date('Y-m-01 H:i:s', $this->outputTimestamp));
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', strtotime(date('Y-m-01', $this->outputTimestamp) . ' + 1 months - 1 days')));
        return $this->output();
    }

    public function last($number = 1)
    {
        $m = date('m', $this->outputTimestamp);
        $t = date('t', strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m - $number, 1, date('Y', $this->outputTimestamp)))));
        $d = date('d', $this->outputTimestamp);
        if ($d > $t) {
            $d = $t;
        }

        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m - $number, $d, date('Y', $this->outputTimestamp))));
        
        return $this;
    }

    public function next($number = 1)
    {
        $m = (int)date('m', $this->outputTimestamp);
        $t = (int)date('t', strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m + $number, 1, date('Y', $this->outputTimestamp)))));
        $d = (int)date('d', $this->outputTimestamp);
        if ($d > $t) {
            $d = $t;
        }

        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $m + $number, $d, date('Y', $this->outputTimestamp))));
        return $this;
    }

    public function diff($string)
    {
        $timestamp = PhpDateHelper::getTimestamp($string);
        return floor(abs($timestamp - $this->inputTimestamp) / (7 * 24 * 3600));
    }
}