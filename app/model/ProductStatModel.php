<?php

class ProductStatModel extends BaseModel
{
    protected $table = TB_PRODUCT_STAT;

    public function plusView($productId){

        if (!is_numeric($productId) or $productId < 1)
            return false;

        $productModel = new ProductModel();

        if (!$productModel->productExistByProductId($productId))
            return false;

        if($this->productExistByProductId($productId)){

            $update = $this->getSql()->update();
            $update->set(array(
                "view" => new \Zend\Db\Sql\Expression("view + 1")
            ));
            $update->where(array("product_id" => $productId));

            return $this->updateWith($update);
        }else{

            $insert = $this->getSql()->insert();
            $insert->values(array(
                "view" => 1,
                "product_id" => $productId
            ));

            return $this->insertWith($insert);
        }
    }

    public function plusLike($productId){

        if (!is_numeric($productId) or $productId < 1)
            return false;

        $productModel = new ProductModel();

        if (!$productModel->productExistByProductId($productId))
            return false;

        if($this->productExistByProductId($productId)){

            $update = $this->getSql()->update();
            $update->set(array(
                "like" => new \Zend\Db\Sql\Expression("`like` + 1")
            ));
            $update->where(array("product_id" => $productId));

            return $this->updateWith($update);
        }else{

            $insert = $this->getSql()->insert();
            $insert->values(array(
                "like" => 1,
                "product_id" => $productId
            ));

            return $this->insertWith($insert);
        }
    }

    public function minesLike($productId){

        if (!is_numeric($productId) or $productId < 1)
            return false;

        $productModel = new ProductModel();

        if (!$productModel->productExistByProductId($productId))
            return false;

        if($this->productExistByProductId($productId)){

            $update = $this->getSql()->update();
            $update->set(array(
                "like" => new \Zend\Db\Sql\Expression("`like` - 1")
            ));
            $update->where(array("product_id" => $productId));

            return $this->updateWith($update);
        }
    }

    public function productExistByProductId($productId)
    {
        $result = $this->select(array("product_id" => $productId));

        if (is_array($result) and count($result) > 0)
            return true;

        return false;
    }
}