<?php

namespace Aigletter\App\Controllers;

use Aigletter\Framework\Application;
use Mursalov\QueryBuilder\DB;
use Mursalov\QueryBuilder\QueryBuilder;

class getUserAgeController
{
    public function usersAge()
    {
        $builder = new QueryBuilder();
        $query = $builder->table('users')
            ->select(['first_name', 'age'])
            ->where(['status' => 'active'])
            ->order(['id' => 'ASC'])
//            ->limit(20)
//            ->offset(1)
            ->build();
        $db = new DB(Application::getApp()->getComponent('DB'));
        $users = $db->all($query);
        echo '<pre>';
        echo '____________all demo________________________' . PHP_EOL;
        print_r($users);
        echo '/<pre>';
                echo '____________one demo________________________' . PHP_EOL;
        $user = $db->one($query);
        print_r($user);
    }
}