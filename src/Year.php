<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:11
 */

namespace Rxlisbest\PhpDate;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;

class Year extends PhpDate implements StandardInterface
{
    public function begin()
    {
        $this->outputTimestamp = strtotime(date('Y-01-01', $this->inputTimestamp));
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = strtotime(date('Y-12-31', $this->inputTimestamp));
        return $this->output();
    }
}