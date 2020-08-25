<?php

use \Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

class BaseModel extends TableGateway
{

    public function __construct()
    {
        $adapter = new Adapter([
            'driver'   => 'Mysqli',
            'database' => 'shop_manager',
            'username' => 'root',
            'password' => '',
        ]);

        parent::__construct($this->table, $adapter);
    }

    public function select($where = null)
    {
        $result = parent::select($where);
        return $result->toArray();
    }
}