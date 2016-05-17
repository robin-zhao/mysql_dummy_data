<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Time extends Datetime
{
    public function generateRandom()
    {
        return  rand($this->hour[0], $this->hour[1])
            . ':' . rand($this->minute[0], $this->minute[1])
            . ':' . rand($this->second[0], $this->second[1]);
    }
}
