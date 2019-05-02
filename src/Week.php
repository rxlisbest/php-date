<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:12
 */

namespace Rxlisbest\PhpDate;

use Rxlisbest\PhpDate\Interfaces\StandardInterface;
use Rxlisbest\PhpDate\Interfaces\WeekInterface;

class Week extends PhpDate implements StandardInterface, WeekInterface
{
    protected $diff = 0;

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
        $this->diff = 6;
        return $this->calculate();
    }

    public function sunday()
    {
        return $this->begin();
    }

    public function monday()
    {
        $this->diff = 1;
        return $this->calculate();
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
        return $this->end();
    }

    protected function calculate()
    {
        $this->outputTimestamp = $this->inputTimestamp - ((date('w', $this->inputTimestamp)) - $this->diff) * 24 * 3600;
        return $this->output();
    }
}