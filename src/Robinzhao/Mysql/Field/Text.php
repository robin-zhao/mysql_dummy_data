<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Text extends Char
{
    /**
     * 
     * @param string $name
     * @param string $type
     */
    protected function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->typeSize = 255;
    }
    


}
