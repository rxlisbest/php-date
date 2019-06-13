<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-29
 * Time: 09:18
 */

namespace Rxlisbest\PhpDate\Tests\Classes;

use PHPUnit\Framework\TestCase;
use Rxlisbest\PhpDate\PhpDate;

class MonthTest extends TestCase
{
    public function testStandard()
    {
        $timestamp = 1527729723; // 2018-05-31 09:22:03
        $month = (new PhpDate($timestamp))->month;
        $this->assertEquals($month->today(), '2018-05-31');
        $this->assertEquals($month->begin(), '2018-05-01');
        $this->assertEquals($month->end(), '2018-05-31');

        $this->assertEquals($month->next()->today(), '2018-06-30');
        $this->assertEquals($month->next()->begin(), '2018-06-01');
        $this->assertEquals($month->next()->end(), '2018-06-30');

        $this->assertEquals($month->next(2)->today(), '2018-07-31');
        $this->assertEquals($month->next(2)->begin(), '2018-07-01');
        $this->assertEquals($month->next(2)->end(), '2018-07-31');

        $this->assertEquals($month->next(3)->today(), '2018-08-31');
        $this->assertEquals($month->next(3)->begin(), '2018-08-01');
        $this->assertEquals($month->next(3)->end(), '2018-08-31');


        $this->assertEquals($month->last()->today(), '2018-04-30');
        $this->assertEquals($month->last()->begin(), '2018-04-01');
        $this->assertEquals($month->last()->end(), '2018-04-30');

        $this->assertEquals($month->last(2)->today(), '2018-03-31');
        $this->assertEquals($month->last(2)->begin(), '2018-03-01');
        $this->assertEquals($month->last(2)->end(), '2018-03-31');

        $this->assertEquals($month->last(3)->today(), '2018-02-28');
        $this->assertEquals($month->last(3)->begin(), '2018-02-01');
        $this->assertEquals($month->last(3)->end(), '2018-02-28');


        $this->assertEquals($month->diff('2017-05-31'), 12);
        $this->assertEquals($month->diff('2019-05-31'), 11);
        $this->assertEquals($month->diff('2019-06-01'), 12);
        $this->assertEquals($month->diff('2019-2-28 10:00:00'), 9);
        $this->assertEquals($month->diff('2019-2-28'), 8);
    }
}