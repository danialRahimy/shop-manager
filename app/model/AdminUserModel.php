<?php

class AdminUserModel extends BaseModel
{
    protected $table = TB_ADMIN_USERS;

    public function selectUserByEmailOrUsername($usernameOREmail)
    {
        $where = "username = '$usernameOREmail' OR email = '$usernameOREmail'";

        $result = $this->select($where);

        return $result;
    }
}