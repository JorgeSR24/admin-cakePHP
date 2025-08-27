<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class UsersTable extends Table{
    public function initialize(array $config): void
    {
        //tbl_user
        $this->setTable("tbl_users");
    }
}


?>