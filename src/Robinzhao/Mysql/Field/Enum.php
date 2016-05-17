<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Enum extends Field
{

    protected $enum = [];

    public function generateRandom()
    {
        $seed = rand(0, count($this->enum) -1);
        return $this->enum[$seed];
    }

    /**
     * 
     * @param string $name
     * @param string $type int(10) => type:int, typeSize:10
     */
    protected function __construct($name, $type)
    {
        
        $this->name = $name;

        $types = explode('(', $type);
        
        $string = str_replace(')', '', $types[1]);
        $string = str_replace("'", '', $string);
        $this->enum = explode(',', $string);
        
        
        $this->type = $types[0];
        $this->typeSize = count($this->enum);
    }

}
