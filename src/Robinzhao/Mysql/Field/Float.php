<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Float extends Field
{

    protected $fragSize;

    public function generateRandom()
    {

        if ($this->typeSize == 0 && $this->fragSize == 0) {
            $this->typeSize = 8;
            $this->fragSize = 3;
        }

        $frag = (float) (rand(0, pow(10, $this->fragSize) - 1) / pow(10, $this->fragSize));
        $int = rand(0, pow(10, $this->typeSize - $this->fragSize) - 1);

        return $frag + $int;
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

        $this->type = $types[0];

        if (count($types) === 2) {
            $parts = explode(',', substr($types[1], 0, -1));
            $this->typeSize = (int) $parts[0];
            $this->fragSize = (int) $parts[1];
        } else {
            $this->typeSize = 0;
            $this->fragSize = 0;
        }
    }

}
