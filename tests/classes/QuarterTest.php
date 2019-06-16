<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-05-29
 * Time: 20:05
 */

namespace Rxlisbest\PhpDate\Tests\Classes;

use PHPUnit\Framework\TestCase;
use Rxlisbest\PhpDate\PhpDate;

class QuarterTest extends TestCase
{
    public function testStandard()
    {
        $timestamp = 1464696432; // 2016-05-31 20:07:12

        $quarter = (new PhpDate($timestamp))->quarter;
        $this->assertEquals($quarter->today(), '2016-05-31');
        $this->assertEquals($quarter->begin(), '2016-04-01');
        $this->assertEquals($quarter->end(), '2016-06-30');

        $this->assertEquals($quarter->next()->today(), '2016-08-31');
        $this->assertEquals($quarter->next()->begin(), '2016-07-01');
        $this->assertEquals($quarter->next()->end(), '2016-09-30');

        $this->assertEquals($quarter->next(2)->today(), '2016-11-30');
        $this->assertEquals($quarter->next(2)->begin(), '2016-10-01');
        $this->assertEquals($quarter->next(2)->end(), '2016-12-31');

        $this->assertEquals($quarter->next(3)->today(), '2017-02-28');
        $this->assertEquals($quarter->next(3)->begin(), '2017-01-01');
        $this->assertEquals($quarter->next(3)->end(), '2017-03-31');


        $this->assertEquals($quarter->last()->today(), '2016-02-29');
        $this->assertEquals($quarter->last()->begin(), '2016-01-01');
        $this->assertEquals($quarter->last()->end(), '2016-03-31');

        $this->assertEquals($quarter->last(2)->today(), '2015-11-30');
        $this->assertEquals($quarter->last(2)->begin(), '2015-10-01');
        $this->assertEquals($quarter->last(2)->end(), '2015-12-31');

        $this->assertEquals($quarter->last(3)->today(), '2015-08-31');
        $this->assertEquals($quarter->last(3)->begin(), '2015-07-01');
        $this->assertEquals($quarter->last(3)->end(), '2015-09-30');

        $this->assertEquals($quarter->diff('2015-09-30'), 3);
        $this->assertEquals($quarter->diff('2015-12-31'), 2);
        $this->assertEquals($quarter->diff('2016-02-29'), 1);
    }
}