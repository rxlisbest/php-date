<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-18
 * Time: 15:17
 */
namespace Rxlisbest\PhpDate\Providers;

use Pimple\ServiceProviderInterface;
use Rxlisbest\PhpDate\Classes\Quarter;

class QuarterProvider implements ServiceProviderInterface
{
    public function register(\Pimple\Container $pimple)
    {
        $pimple['quarter'] = function ($app) {
            return new Quarter($app->timestamp);
        };
    }
}