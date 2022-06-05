<?php

namespace Aigletter\Framework\Components;

use PDO;

class DB
{
    private static self $instance;
    static private PDO $PDO;

    private function __construct()
    {
        if (isset(self::$instance)) {
            $instance = new DB();
        }
    }
}