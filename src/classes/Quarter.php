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

    public function today()
    {
        $this->outputTimestamp = $this->outputTimestamp;
        return $this->output();
    }

    public function begin()
    {
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), ($this->season * 3 - 3 + 1), 1, date('Y', $this->outputTimestamp))));
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', mktime(date('H', $this->outputTimestamp), date('i', $this->outputTimestamp), date('s', $this->outputTimestamp), $this->season * 3, date('t', mktime(0, 0, 0, $this->season * 3, 1, date('Y', $this->outputTimestamp))), date('Y', $this->outputTimestamp))));
        return $this->output();
    }

    protected function setSeason()
    {
        $this->season = ceil(date('m', $this->outputTimestamp) / 3);
    }
}