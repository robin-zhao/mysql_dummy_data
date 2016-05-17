<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Year extends Datetime
{
    
    public function generateRandom()
    {
        return rand($this->year[0], $this->year[1]);
    }
}
