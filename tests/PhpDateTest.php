<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-19
 * Time: 18:31
 */
namespace Rxlisbest\PhpDate\Tests;

use PHPUnit\Framework\TestCase;
use Rxlisbest\PhpDate\PhpDate;

class PhpDateTest extends TestCase
{
    public function testWeek()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30
        $week = (new PhpDate($timestamp))->week;
        $this->assertEquals($week->format('Y-m-d')->today(), '2019-05-18');
        $this->assertEquals($week->format('Y-m-d')->begin(), '2019-05-12');
        $this->assertEquals($week->format('Y-m-d')->end(), '2019-05-18');
        $this->assertEquals($week->format('Y-m-d')->sunday(), '2019-05-12');
        $this->assertEquals($week->format('Y-m-d')->monday(), '2019-05-13');
        $this->assertEquals($week->format('Y-m-d')->tuesday(), '2019-05-14');
        $this->assertEquals($week->format('Y-m-d')->wednesday(), '2019-05-15');
        $this->assertEquals($week->format('Y-m-d')->thursday(), '2019-05-16');
        $this->assertEquals($week->format('Y-m-d')->friday(), '2019-05-17');
        $this->assertEquals($week->format('Y-m-d')->saturday(), '2019-05-18');

        $this->assertEquals($week->format('Y-m-d')->next()->today(), '2019-05-25');
        $this->assertEquals($week->format('Y-m-d')->next()->begin(), '2019-05-19');


        $timestamp = 1527071592; // 2018-05-23 18:33:12
        $week = (new PhpDate($timestamp))->week;
        $this->assertEquals($week->format('Y-m-d')->today(), '2018-05-23');
        $this->assertEquals($week->format('Y-m-d')->begin(), '2018-05-20');
        $this->assertEquals($week->format('Y-m-d')->end(), '2018-05-26');
        $this->assertEquals($week->format('Y-m-d')->sunday(), '2018-05-20');
        $this->assertEquals($week->format('Y-m-d')->monday(), '2018-05-21');
        $this->assertEquals($week->format('Y-m-d')->tuesday(), '2018-05-22');
        $this->assertEquals($week->format('Y-m-d')->wednesday(), '2018-05-23');
        $this->assertEquals($week->format('Y-m-d')->thursday(), '2018-05-24');
        $this->assertEquals($week->format('Y-m-d')->friday(), '2018-05-25');
        $this->assertEquals($week->format('Y-m-d')->saturday(), '2018-05-26');

        $this->assertEquals($week->format('Y-m-d')->last()->today(), '2018-05-16');
        $this->assertEquals($week->format('Y-m-d')->last()->begin(), '2018-05-13');
    }

    public function testChineseWeek()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30
        $chineseWeek = (new PhpDate($timestamp))->chineseWeek;
        $this->assertEquals($chineseWeek->format('Y-m-d')->today(), '2019-05-18');
        $this->assertEquals($chineseWeek->format('Y-m-d')->begin(), '2019-05-13');
        $this->assertEquals($chineseWeek->format('Y-m-d')->end(), '2019-05-19');
        $this->assertEquals($chineseWeek->format('Y-m-d')->monday(), '2019-05-13');
        $this->assertEquals($chineseWeek->format('Y-m-d')->tuesday(), '2019-05-14');
        $this->assertEquals($chineseWeek->format('Y-m-d')->wednesday(), '2019-05-15');
        $this->assertEquals($chineseWeek->format('Y-m-d')->thursday(), '2019-05-16');
        $this->assertEquals($chineseWeek->format('Y-m-d')->friday(), '2019-05-17');
        $this->assertEquals($chineseWeek->format('Y-m-d')->saturday(), '2019-05-18');
        $this->assertEquals($chineseWeek->format('Y-m-d')->sunday(), '2019-05-19');

        $timestamp = 1527071592; // 2018-05-23 18:33:12
        $chineseWeek = (new PhpDate($timestamp))->chineseWeek;
        $this->assertEquals($chineseWeek->format('Y-m-d')->today(), '2018-05-23');
        $this->assertEquals($chineseWeek->format('Y-m-d')->begin(), '2018-05-21');
        $this->assertEquals($chineseWeek->format('Y-m-d')->end(), '2018-05-27');
        $this->assertEquals($chineseWeek->format('Y-m-d')->monday(), '2018-05-21');
        $this->assertEquals($chineseWeek->format('Y-m-d')->tuesday(), '2018-05-22');
        $this->assertEquals($chineseWeek->format('Y-m-d')->wednesday(), '2018-05-23');
        $this->assertEquals($chineseWeek->format('Y-m-d')->thursday(), '2018-05-24');
        $this->assertEquals($chineseWeek->format('Y-m-d')->friday(), '2018-05-25');
        $this->assertEquals($chineseWeek->format('Y-m-d')->saturday(), '2018-05-26');
        $this->assertEquals($chineseWeek->format('Y-m-d')->sunday(), '2018-05-27');
    }

    public function testMonth()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $month = (new PhpDate($timestamp))->month;
        $this->assertEquals($month->format('Y-m-d')->today(), '2019-05-18');
        $this->assertEquals($month->format('Y-m-d')->begin(), '2019-05-01');
        $this->assertEquals($month->format('Y-m-d')->end(), '2019-05-31');

        $this->assertEquals($month->format('Y-m-d')->next()->today(), '2019-06-18');
        $this->assertEquals($month->format('Y-m-d')->last()->today(), '2019-04-18');

        $timestamp = 1527071592; // 2018-05-23 18:33:12
        $month = (new PhpDate($timestamp))->month;
        $this->assertEquals($month->format('Y-m-d')->today(), '2018-05-23');
        $this->assertEquals($month->format('Y-m-d')->begin(), '2018-05-01');
        $this->assertEquals($month->format('Y-m-d')->end(), '2018-05-31');

        $timestamp = '2019-05-31';
        $month = (new PhpDate($timestamp))->month;
        $this->assertEquals($month->format('Y-m-d')->next()->today(), '2019-06-30');
        $this->assertEquals($month->format('Y-m-d')->last()->today(), '2019-04-30');
    }

    public function testYear()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $year = (new PhpDate($timestamp))->year;
        $this->assertEquals($year->format('Y-m-d')->today(), '2019-05-18');
        $this->assertEquals($year->format('Y-m-d')->begin(), '2019-01-01');
        $this->assertEquals($year->format('Y-m-d')->end(), '2019-12-31');

        $this->assertEquals($year->format('Y-m-d')->next()->today(), '2020-05-18');
        $this->assertEquals($year->format('Y-m-d')->next()->begin(), '2020-01-01');

        $timestamp = 1527071592; // 2018-05-23 18:33:12
        $year = (new PhpDate($timestamp))->year;
        $this->assertEquals($year->format('Y-m-d')->today(), '2018-05-23');
        $this->assertEquals($year->format('Y-m-d')->begin(), '2018-01-01');
        $this->assertEquals($year->format('Y-m-d')->end(), '2018-12-31');

        $this->assertEquals($year->format('Y-m-d')->last(2)->today(), '2016-05-23');
        $this->assertEquals($year->format('Y-m-d')->last(2)->begin(), '2016-01-01');
    }

    public function testQuarter()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $quarter = (new PhpDate($timestamp))->quarter;
        $this->assertEquals($quarter->format('Y-m-d')->today(), '2019-05-18');
        $this->assertEquals($quarter->format('Y-m-d')->begin(), '2019-04-01');
        $this->assertEquals($quarter->format('Y-m-d')->end(), '2019-06-30');

        $this->assertEquals((new PhpDate('2018-11-18'))->quarter->format('Y-m-d')->begin(), '2018-10-01');
        $this->assertEquals($quarter->format('Y-m-d')->last(2)->begin(), '2018-10-01');
        $this->assertEquals($quarter->format('Y-m-d')->last(2)->today(), '2018-11-18');

        $timestamp = 1527071592; // 2018-05-23 18:33:12
        $quarter = (new PhpDate($timestamp))->quarter;
        $this->assertEquals($quarter->format('Y-m-d')->today(), '2018-05-23');
        $this->assertEquals($quarter->format('Y-m-d')->begin(), '2018-04-01');
        $this->assertEquals($quarter->format('Y-m-d')->end(), '2018-06-30');

        $timestamp = '2018-05-31';
        $quarter = (new PhpDate($timestamp))->quarter;
        $this->assertEquals($quarter->format('Y-m-d')->next()->today(), '2018-08-31');
        $this->assertEquals($quarter->format('Y-m-d')->last()->today(), '2018-02-28');
    }
}