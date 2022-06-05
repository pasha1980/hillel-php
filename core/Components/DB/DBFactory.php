<?php

namespace Aigletter\Framework\Components\DB;

use Aigletter\Contracts\ComponentFactory;

class DBFactory extends ComponentFactory
{

    protected function createConcreteComponent(): \PDO
    {
        return DB::getInstance()->getConnection();
    }
}