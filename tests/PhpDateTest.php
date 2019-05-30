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
}