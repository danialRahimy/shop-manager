<?php

class CustomerProductLikeModel extends BaseModel
{
    protected $table = TB_CUSTOMER_PRODUCT_LIKE;

    public function likeIsExist($customer, $productId)
    {
        $where = array(
            "customer" => $customer,
            "product_id" => $productId
        );

        $result = $this->select($where);

        if (is_array($result) and count($result) > 0)
            return true;

        return false;
    }

    public function likeToggle($userLogged, $productId)
    {
        $data = array(
            "customer" => $userLogged,
            "product_id" => $productId
        );

        $favoriteExist = $this->likeIsExist($userLogged, $productId);

        $result = array(
            "status" => 0,
        );

        if ($favoriteExist){

            $result["status"] = $this->delete($data);
            $result["action"] = "delete";
        }else{

            $result["status"] = $this->insert($data);
            $result["action"] = "add";
        }

        return $result;
    }
}