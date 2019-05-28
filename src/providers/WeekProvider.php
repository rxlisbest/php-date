<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-18
 * Time: 15:17
 */
namespace Rxlisbest\PhpDate\Providers;

use Pimple\ServiceProviderInterface;
use Rxlisbest\PhpDate\Classes\Week;

class WeekProvider implements ServiceProviderInterface
{
    public function register(\Pimple\Container $pimple)
    {
        $pimple['week'] = function ($app) {
            return new Week($app->timestamp);
        };
    }
}