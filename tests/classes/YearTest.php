<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-30
 * Time: 09:37
 */

namespace Rxlisbest\PhpDate\Tests\Classes;

use PHPUnit\Framework\TestCase;
use Rxlisbest\PhpDate\PhpDate;

class YearTest extends TestCase
{
    public function testStandard()
    {
        $timestamp = 1558176210; // 2019-05-18 18:43:30

        $year = (new PhpDate($timestamp))->year;
        $this->assertEquals($year->today(), '2019-05-18');
        $this->assertEquals($year->begin(), '2019-01-01');
        $this->assertEquals($year->end(), '2019-12-31');

        $this->assertEquals($year->next()->today(), '2020-05-18');
        $this->assertEquals($year->next()->begin(), '2020-01-01');
        $this->assertEquals($year->next()->end(), '2020-12-31');

        $this->assertEquals($year->next(2)->today(), '2021-05-18');
        $this->assertEquals($year->next(2)->begin(), '2021-01-01');
        $this->assertEquals($year->next(2)->end(), '2021-12-31');

        $this->assertEquals($year->last()->today(), '2018-05-18');
        $this->assertEquals($year->last()->begin(), '2018-01-01');
        $this->assertEquals($year->last()->end(), '2018-12-31');

        $this->assertEquals($year->last(2)->today(), '2017-05-18');
        $this->assertEquals($year->last(2)->begin(), '2017-01-01');
        $this->assertEquals($year->last(2)->end(), '2017-12-31');

        $timestamp = '2016-02-29';
        $year = (new PhpDate($timestamp))->year;

        $this->assertEquals($year->next()->today(), '2017-02-28');
        $this->assertEquals($year->next(4)->today(), '2020-02-29');

        $this->assertEquals($year->last()->today(), '2015-02-28');
        $this->assertEquals($year->last(4)->today(), '2012-02-29');

        $this->assertEquals($year->diff('17-02-28'), 1);
        $this->assertEquals($year->diff('17-02-27'), 0);
    }
}