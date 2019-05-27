<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-19
 * Time: 18:31
 */
namespace Rxlisbest\PhpDate\Tests\Classes;

use PHPUnit\Framework\TestCase;
use Rxlisbest\PhpDate\PhpDate;

class WeekTest extends TestCase
{
    public function testIndex()
    {
        $week = (new PhpDate())->week;
        $this->assertEquals($week->format('Y-m-d')->today(), date('Y-m-d'));
        $this->assertEquals($week->format('Y-m-d')->begin(), '2019-05-12');
        $this->assertEquals($week->format('Y-m-d')->end(), '2019-05-18');
    }
}