<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 08:42
 */
namespace Rxlisbest\PhpDate\Interfaces;

interface StandardInterface
{
    public function begin();

    public function today();

    public function end();

    public function last($number = 1);

    public function next($number = 1);

    public function diff($string);
}