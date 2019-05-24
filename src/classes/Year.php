<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:11
 */

namespace Rxlisbest\PhpDate\Classes;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;

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
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', $this->outputTimestamp) . ' - 1 years');
        return $this;
    }

    public function next($number = 1)
    {
        $this->outputTimestamp = strtotime(date('Y-m-d H:i:s', $this->outputTimestamp) . ' + 1 years');
        return $this;
    }
}