<?php
namespace Robinzhao\Mysql\Field;
/**
 * Description of Field
 *
 * @author Robin Zhao <rzhao@defymedia.com>
 */
abstract class Field
{
    protected $name;
    protected $type;
    protected $typeSize;

    public static function factory($name, $type)
    {
        $types = explode('(', $type);
        switch($types[0]) {
            case 'int':
                return new Int($name, $type);
            case 'varchar':
                return new Varchar($name, $type);
            case 'char':
                return new Char($name, $type);
        }
        throw  new \Exception("Not supported: " . $types[0]);
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
        $this->typeSize = substr($types[1], 0, -1);
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getTypeSize()
    {
        return $this->typeSize;
    }
    
    abstract public function generateRandom();
        
}
