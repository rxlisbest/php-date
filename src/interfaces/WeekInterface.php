<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-28
 * Time: 20:07
 */
namespace Rxlisbest\PhpDate\Interfaces;

interface WeekInterface
{
    public function sunday();

    public function monday();

    public function tuesday();

    public function wednesday();

    public function thursday();

    public function friday();

    public function saturday();
}