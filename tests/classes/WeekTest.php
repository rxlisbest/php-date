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
    public function testStandard()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30
        $week = (new PhpDate($timestamp))->week;
        $this->assertEquals($week->today(), '2019-05-18');
        $this->assertEquals($week->begin(), '2019-05-12');
        $this->assertEquals($week->end(), '2019-05-18');
        for ($i = 0; $i < 5; $i ++) {
            $this->assertEquals($week->next($i)->today(), date('Y-m-d', strtotime('2019-05-18' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->begin(), date('Y-m-d', strtotime('2019-05-12' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->end(), date('Y-m-d', strtotime('2019-05-18' . " + ${i} weeks")));

            $this->assertEquals($week->last($i)->today(), date('Y-m-d', strtotime('2019-05-18' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->begin(), date('Y-m-d', strtotime('2019-05-12' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->end(), date('Y-m-d', strtotime('2019-05-18' . " - ${i} weeks")));
        }
    }

    public function testWeek()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30
        $week = (new PhpDate($timestamp))->week;
        $this->assertEquals($week->sunday(), '2019-05-12');
        $this->assertEquals($week->monday(), '2019-05-13');
        $this->assertEquals($week->tuesday(), '2019-05-14');
        $this->assertEquals($week->wednesday(), '2019-05-15');
        $this->assertEquals($week->thursday(), '2019-05-16');
        $this->assertEquals($week->friday(), '2019-05-17');
        $this->assertEquals($week->saturday(), '2019-05-18');

        for ($i = 0; $i < 5; $i ++) {
            $this->assertEquals($week->next($i)->sunday(), date('Y-m-d', strtotime('2019-05-12' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->monday(), date('Y-m-d', strtotime('2019-05-13' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->tuesday(), date('Y-m-d', strtotime('2019-05-14' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->wednesday(), date('Y-m-d', strtotime('2019-05-15' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->thursday(), date('Y-m-d', strtotime('2019-05-16' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->friday(), date('Y-m-d', strtotime('2019-05-17' . " + ${i} weeks")));
            $this->assertEquals($week->next($i)->saturday(), date('Y-m-d', strtotime('2019-05-18' . " + ${i} weeks")));

            $this->assertEquals($week->last($i)->sunday(), date('Y-m-d', strtotime('2019-05-12' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->monday(), date('Y-m-d', strtotime('2019-05-13' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->tuesday(), date('Y-m-d', strtotime('2019-05-14' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->wednesday(), date('Y-m-d', strtotime('2019-05-15' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->thursday(), date('Y-m-d', strtotime('2019-05-16' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->friday(), date('Y-m-d', strtotime('2019-05-17' . " - ${i} weeks")));
            $this->assertEquals($week->last($i)->saturday(), date('Y-m-d', strtotime('2019-05-18' . " - ${i} weeks")));
        }
    }
}