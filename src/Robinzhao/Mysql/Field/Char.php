<?php

namespace Robinzhao\Mysql\Field;

/**
 * Description of Varchar
 *
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Char extends Field
{

    protected function randChar()
    {
        switch (rand(0, 1))
        {
            case 0:
                $c = rand(65, 90);
                break;
            case 1:
            default:
                $c = rand(97, 122);
                break;
        }
        return chr($c);
    }

    public function generateRandom()
    {
        
        $string = '';
        for ($i = 0; $i < $this->getTypeSize(); $i++) {
            $string .= $this->randChar();
        }
        return $string;
    }

}
