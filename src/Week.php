<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-29
 * Time: 09:12
 */

namespace Rxlisbest\PhpDate;

use Rxlisbest\PhpDate\Interfaces\BaseInterface;

class Week extends PhpDate implements BaseInterface
{
    public function begin()
    {
        $this->outputTimestamp = $this->inputTimestamp + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600;
        return $this->output();
    }

    public function end()
    {
        // TODO: Implement end() method.
    }
}