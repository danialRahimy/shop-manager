<?php

class CustomerModel extends BaseModel
{
    protected $table = TB_CUSTOMERS;

    public function selectUserByEmailOrUsername($usernameOREmail)
    {
        $where = "username = '$usernameOREmail' OR email = '$usernameOREmail'";

        $result = $this->select($where);

        return $result;
    }
}