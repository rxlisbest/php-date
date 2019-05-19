<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-18
 * Time: 15:17
 */
namespace Rxlisbest\PhpDate\Providers;

use Pimple\ServiceProviderInterface;
use Rxlisbest\PhpDate\Classes\ChineseWeek;

class ChineseWeekProvider implements ServiceProviderInterface
{
    public function register(\Pimple\Container $pimple)
    {
        $pimple['chineseWeek'] = function ($app) {
            return new ChineseWeek($app->timestamp);
        };
    }
}