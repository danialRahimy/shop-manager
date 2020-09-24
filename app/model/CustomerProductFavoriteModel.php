<?php


class CustomerProductFavoriteModel extends BaseModel
{
    protected $table = TB_CUSTOMER_PRODUCT_FAVORITE;

    public function favoriteIsExist($customer, $productId)
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

    public function favoriteToggle($userLogged, $productId)
    {
        $data = array(
            "customer" => $userLogged,
            "product_id" => $productId
        );

        $favoriteExist = $this->favoriteIsExist($userLogged, $productId);

        if ($favoriteExist)
            $status = $this->delete($data);
        else
            $status = $this->insert($data);

        return $status;
    }
}