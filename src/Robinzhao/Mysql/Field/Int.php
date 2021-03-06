<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Int extends Field
{

    public function generateRandom()
    {
        return rand(0, pow(10, $this->getTypeSize()) - 1);
    }

}
