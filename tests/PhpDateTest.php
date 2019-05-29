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
    public function testIndex()
    {
        $this->assertInstanceOf(\Rxlisbest\PhpDate\Classes\ChineseWeek::class, (new PhpDate())->chineseWeek);
        $this->assertInstanceOf(\Rxlisbest\PhpDate\Classes\Month::class, (new PhpDate())->month);
        $this->assertInstanceOf(\Rxlisbest\PhpDate\Classes\Quarter::class, (new PhpDate())->quarter);
        $this->assertInstanceOf(\Rxlisbest\PhpDate\Classes\Week::class, (new PhpDate())->week);
        $this->assertInstanceOf(\Rxlisbest\PhpDate\Classes\Year::class, (new PhpDate())->year);
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