<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:11
 */

namespace Rxlisbest\PhpDate\Classes;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;

class Quarter extends Base implements StandardInterface
{
    protected $season;

    public function __construct($string = 0)
    {
        parent::__construct($string);
        $this->setSeason();
    }

    public function begin()
    {
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->inputTimestamp), date('i', $this->inputTimestamp), date('s', $this->inputTimestamp), ($this->season * 3 - 3 + 1), 1, date('Y', $this->inputTimestamp))));
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->inputTimestamp), date('i', $this->inputTimestamp), date('s', $this->inputTimestamp), $this->season * 3, date('t', mktime(0, 0, 0, $this->season * 3, 1, date('Y', $this->inputTimestamp))), date('Y', $this->inputTimestamp))));
        return $this->output();
    }

    protected function setSeason()
    {
        $this->season = ceil(date('m', $this->inputTimestamp) / 3);
    }
}