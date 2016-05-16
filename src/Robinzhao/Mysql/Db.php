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

    protected static $pdo;

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

    public function getTables()
    {
        $result = static::pdo()->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            yield $row[0];
        }
    }

}
