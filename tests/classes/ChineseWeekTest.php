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

    public function testWeek()
    {
        $timestamp = 1556697269; // 2019-05-01 15:54:29
        $week = (new PhpDate($timestamp))->week;
        $this->assertEquals($week->sunday(), '2019-05-05');
        $this->assertEquals($week->monday(), '2019-04-29');
        $this->assertEquals($week->tuesday(), '2019-04-30');
        $this->assertEquals($week->wednesday(), '2019-05-01');
        $this->assertEquals($week->thursday(), '2019-05-02');
        $this->assertEquals($week->friday(), '2019-05-03');
        $this->assertEquals($week->saturday(), '2019-05-04');

        for ($i = 0; $i < 5; $i ++) {
            $this->assertEquals($week->next($i)->monday(), date('Y-m-d', strtotime('2019-04-29' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->tuesday(), date('Y-m-d', strtotime('2019-04-30' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->wednesday(), date('Y-m-d', strtotime('2019-05-01' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->thursday(), date('Y-m-d', strtotime('2019-05-02' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->friday(), date('Y-m-d', strtotime('2019-05-03' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->saturday(), date('Y-m-d', strtotime('2019-05-04' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->sunday(), date('Y-m-d', strtotime('2019-05-05' . " + ${i} weeks")));

            $this->assertEquals($week->last($i)->monday(), date('Y-m-d', strtotime('2019-04-29' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->tuesday(), date('Y-m-d', strtotime('2019-04-30' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->wednesday(), date('Y-m-d', strtotime('2019-05-01' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->thursday(), date('Y-m-d', strtotime('2019-05-02' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->friday(), date('Y-m-d', strtotime('2019-05-03' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->saturday(), date('Y-m-d', strtotime('2019-05-04' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->sunday(), date('Y-m-d', strtotime('2019-05-05' . " - ${i} weeks")));
        }
    }
}