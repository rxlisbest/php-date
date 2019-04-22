<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019-04-22
 * Time: 15:40
 */

namespace Rxlisbest\PhpDate\Traits;


trait Week
{
    public function sunday()
    {
        $this->outputTimestamp = $this->inputTimestamp + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600;
        return $this->output();
    }
}