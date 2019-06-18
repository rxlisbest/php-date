<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-18
 * Time: 15:54
 */

namespace Rxlisbest\PhpDate;

use Pimple\Container;

class PhpDate extends Container
{
    protected $providers = [
        Providers\MonthProvider::class,
        Providers\WeekProvider::class,
        Providers\QuarterProvider::class,
        Providers\ChineseWeekProvider::class,
        Providers\YearProvider::class,
    ];

    public function __construct($string = '')
    {
        parent::__construct();
        $this['timestamp'] = $string;
        $this->registerProviders();
    }

    public function diff($string = '')
    {
        $timestamp = PhpDateHelper::getTimestamp($string);

    }

    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }
}