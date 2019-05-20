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
        $this->assertEquals($week->format('Y-m-d')->begin(), '2019-05-12');
        $this->assertEquals($week->format('Y-m-d')->end(), '2019-05-18');
        $this->assertEquals($week->format('Y-m-d')->sunday(), '2019-05-12');
        $this->assertEquals($week->format('Y-m-d')->monday(), '2019-05-13');
        $this->assertEquals($week->format('Y-m-d')->tuesday(), '2019-05-14');
        $this->assertEquals($week->format('Y-m-d')->wednesday(), '2019-05-15');
        $this->assertEquals($week->format('Y-m-d')->thursday(), '2019-05-16');
        $this->assertEquals($week->format('Y-m-d')->friday(), '2019-05-17');
        $this->assertEquals($week->format('Y-m-d')->saturday(), '2019-05-18');
    }

    public function testChineseWeek()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $chineseWeek = (new PhpDate($timestamp))->chineseWeek;
        $this->assertEquals($chineseWeek->format('Y-m-d')->begin(), '2019-05-13');
        $this->assertEquals($chineseWeek->format('Y-m-d')->end(), '2019-05-19');
        $this->assertEquals($chineseWeek->format('Y-m-d')->monday(), '2019-05-13');
        $this->assertEquals($chineseWeek->format('Y-m-d')->tuesday(), '2019-05-14');
        $this->assertEquals($chineseWeek->format('Y-m-d')->wednesday(), '2019-05-15');
        $this->assertEquals($chineseWeek->format('Y-m-d')->thursday(), '2019-05-16');
        $this->assertEquals($chineseWeek->format('Y-m-d')->friday(), '2019-05-17');
        $this->assertEquals($chineseWeek->format('Y-m-d')->saturday(), '2019-05-18');
        $this->assertEquals($chineseWeek->format('Y-m-d')->sunday(), '2019-05-19');
    }

    public function testMonth()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $month = (new PhpDate($timestamp))->month;
        $this->assertEquals($month->format('Y-m-d')->begin(), '2019-05-01');
        $this->assertEquals($month->format('Y-m-d')->end(), '2019-05-31');
    }

    public function testYear()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $year = (new PhpDate($timestamp))->year;
        $this->assertEquals($year->format('Y-m-d')->begin(), '2019-01-01');
        $this->assertEquals($year->format('Y-m-d')->end(), '2019-12-31');
    }
}