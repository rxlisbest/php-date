<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-28
 * Time: 15:52
 */

namespace Rxlisbest\PhpDate\Tests\Classes;

use PHPUnit\Framework\TestCase;
use Rxlisbest\PhpDate\PhpDate;

class ChineseWeekTest
{
    public function testStandard()
    {
        $timestamp = 1556697269; // 2019-05-01 15:54:29
        $week = (new PhpDate($timestamp))->week;
        $this->assertEquals($week->today(), '2019-05-01');
        $this->assertEquals($week->begin(), '2019-04-29');
        $this->assertEquals($week->end(), '2019-05-05');
        for ($i = 0; $i < 5; $i ++) {
            $this->assertEquals($week->next($i)->today(), date('Y-m-d', strtotime('2019-05-01' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->begin(), date('Y-m-d', strtotime('2019-04-29' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->end(), date('Y-m-d', strtotime('2019-05-05' . " + ${i} weeks")));

            $this->assertEquals($week->last($i)->today(), date('Y-m-d', strtotime('2019-05-01' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->begin(), date('Y-m-d', strtotime('2019-04-29' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->end(), date('Y-m-d', strtotime('2019-05-05' . " - ${i} weeks")));
        }
    }
}