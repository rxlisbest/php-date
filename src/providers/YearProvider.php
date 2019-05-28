<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-18
 * Time: 15:17
 */
namespace Rxlisbest\PhpDate\Providers;

use Pimple\ServiceProviderInterface;
use Rxlisbest\PhpDate\Classes\Year;

class YearProvider implements ServiceProviderInterface
{
    public function register(\Pimple\Container $pimple)
    {
        $pimple['year'] = function ($app) {
            return new Year($app->timestamp);
        };
    }
}