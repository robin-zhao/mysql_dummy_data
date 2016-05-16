<?php

namespace Robinzhao\Mysql;

use PDO;
use const ROOT;

/**
 * Factory of PDO object.
 *
 * @author Robin Zhao <rzhao@defymedia.com>
 */
class Db
{

    /**
     *
     * @var \PDO
     */
    protected static $pdo;
    
    protected static $prepare = [];

    public static function pdo()
    {
        if (is_null(static::$pdo)) {

            $ini = parse_ini_file(ROOT . '/database.ini');
            $dsn = "mysql:host=${ini['host']};dbname=${ini['database']}";

            static::$pdo = new PDO($dsn, $ini['user'], $ini['password'], [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);
        }
        return static::$pdo;
    }

    public function __construct()
    {
        static::pdo();
    }

    /**
     * Show all available tables.
     */
    public function getTables()
    {
        $result = static::pdo()->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            yield $row[0];
        }
    }

    /**
     * Show Table definition.
     * 
     * @staticvar array $definition
     * @param string $table
     * @return array
     * @throws \Exception
     */
    public function showTable($table)
    {
        static $definition = [];

        if (empty($definition)) {
            /* @var $result \PDOStatement */
            $result = static::pdo()->query('DESC ' . $table);
            if (!$result) {
                throw new \Exception("No table ${table} found!");
            }
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $definition[] = $row;
            }
        }
        return $definition;
    }
    
    /**
     * Insert a row into table.
     * 
     * @param string $table
     * @param array $row
     */
    public function insert($table, array $row)
    {
        
        if (!isset(static::$prepare[$table])) {
            
            $columns = implode('`,`', array_keys($row));
            static::$prepare[$table] = 
                "insert into `$table` (`$columns`) values ";
        } else {
            
            $values = implode("','", $row);
            static::$prepare[$table] .= " ('$values'),";
            
            if (strlen(static::$prepare[$table]) > 10000) {
                $this->flush();
            }
        }
        
    }
    
    protected function flush()
    {
        foreach (static::$prepare as $sql) {
            $sql = rtrim($sql,',');
            static::$pdo->exec($sql);
        }
        static::$prepare = [];
    }


    public function __destruct()
    {
        $this->flush();
    }

}
