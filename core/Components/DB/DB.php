<?php

namespace Aigletter\Framework\Components\DB;

use Exception;
use PDO;
class DB
{
    private static self $instance;
    private PDO $PDO;
    private function __construct()
    {
        $dbConfig = include dirname(__DIR__, 3) . '/config/DbConfig.php';
        $dsn =  $dbConfig['db_type'] . ':host=' . $dbConfig['db_host'] . ';dbname=' . $dbConfig['db_name'];
        $this->PDO = new PDO($dsn, $dbConfig['db_user'], $dbConfig['db_password']);
    }

    /**
     * @return DB
     */
    public static function getInstance(): DB
    {
        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function __clone(): void
    {
    }

    /**
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new \RuntimeException('Can`t serialize DB class');
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->PDO;
    }


}