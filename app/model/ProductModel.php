<?php

class ProductModel extends BaseModel
{
    protected $table = TB_PRODUCT;

    public function productExistByProductId($productId)
    {
        $result = $this->select(array("id" => $productId));

        if (is_array($result) and count($result) > 0)
            return true;

        return false;
    }
}