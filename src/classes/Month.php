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
    public function begin()
    {
        $this->outputTimestamp = strtotime(date('Y-m-01', $this->inputTimestamp));
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = strtotime(date('Y-m-d', strtotime(date('Y-m-01', $this->inputTimestamp) . ' + 1 months - 1 days')));
        return $this->output();
    }
}