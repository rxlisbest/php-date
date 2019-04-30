<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:12
 */

namespace Rxlisbest\PhpDate\Classes;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;
use Rxlisbest\PhpDate\Interfaces\WeekInterface;
use Rxlisbest\PhpDate\PhpDate;

class ChineseWeek extends PhpDate implements StandardInterface, WeekInterface
{
    public function __construct($string = 0)
    {
        parent::__construct($string);

    }

    public function begin()
    {
        $this->outputTimestamp = $this->inputTimestamp - ((date('w', $this->inputTimestamp) == 0 ? 7 : date('w', $this->inputTimestamp)) - 1) * 24 * 3600;
        return $this->output();
    }

    public function end()
    {
        $this->outputTimestamp = $this->inputTimestamp + (7 - (date('w', $this->inputTimestamp) == 0 ? 7 : date('w', $this->inputTimestamp))) * 24 * 3600;
        return $this->output();
    }

    public function sunday()
    {
        return $this->end();
    }

    public function monday()
    {
        return $this->begin();
    }

    public function tuesday()
    {
        $this->outputTimestamp = $this->inputTimestamp - ((date('w', $this->inputTimestamp) == 0 ? 7 : date('w', $this->inputTimestamp)) - 1) * 24 * 3600;
        return $this->output();
    }

    public function wednesday()
    {
        // TODO: Implement wednesday() method.
    }

    public function thursday()
    {
        // TODO: Implement thursday() method.
    }

    public function friday()
    {
        // TODO: Implement friday() method.
    }

    public function saturday()
    {
        // TODO: Implement saturday() method.
    }

    protected function calculate()
    {

    }
}