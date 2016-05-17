<?php

namespace Robinzhao\Mysql\Field;

/**
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Datetime extends Field
{
    // protected $year = [1000, 9999];
    protected $year = [1970, 2037];

    protected $month = [1, 12];
    protected $day = [1, 28]; // Safe day.

    protected $hour = [0, 23];
    protected $minute = [0, 59];
    protected $second = [0, 59];

    public function generateRandom()
    {
        return rand($this->year[0], $this->year[1])
            . '-' . rand($this->month[0], $this->month[1])
            . '-' . rand($this->day[0], $this->day[1])
            . ' ' . rand($this->hour[0], $this->hour[1])
            . ':' . rand($this->minute[0], $this->minute[1])
            . ':' . rand($this->second[0], $this->second[1]);
    }
    
    /**
     * 
     * @param string $name
     * @param string $type int(10) => type:int, typeSize:10
     */
    protected function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->typeSize = 1;
    }

}
