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

class ChineseWeek extends Base implements StandardInterface, WeekInterface
{
    protected $diff = 1;

    public function __construct($string = 0)
    {
        parent::__construct($string);
    }

    public function begin()
    {
        return $this->calculate();
    }

    public function end()
    {
        $this->diff = 7;
        return $this->calculate();
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
        $this->diff = 2;
        return $this->calculate();
    }

    public function wednesday()
    {
        $this->diff = 3;
        return $this->calculate();
    }

    public function thursday()
    {
        $this->diff = 4;
        return $this->calculate();
    }

    public function friday()
    {
        $this->diff = 5;
        return $this->calculate();
    }

    public function saturday()
    {
        $this->diff = 6;
        return $this->calculate();
    }

    protected function calculate()
    {
        $this->outputTimestamp = $this->inputTimestamp - ((date('w', $this->inputTimestamp) == 0 ? 7 : date('w', $this->inputTimestamp)) - $this->diff) * 24 * 3600;
        return $this->output();
    }
}