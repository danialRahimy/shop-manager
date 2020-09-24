<?php

class ClientProductController extends ClientController
{
    public function toggleFavoriteAction($params = array())
    {
        if (empty($params))
            return false;

        $productId = $params["productID"];

        if (!is_numeric($productId))
            return false;

        $userLogged = (new ClientAuthentication())->getUsername();

        if (!$userLogged)
            return false;

        $productModel = new ProductModel();
        $productIsExist = $productModel->productExistByProductId($productId);

        if (!$productIsExist)
            return false;

        $customerFavoriteModel = new CustomerProductFavoriteModel();

        $status = $customerFavoriteModel->favoriteToggle($userLogged, $productId);

        return $status;
    }

    public function toggleLikeAction($params = array())
    {
        if (empty($params))
            return false;

        $productId = $params["productID"];

        if (!is_numeric($productId))
            return false;

        $userLogged = (new ClientAuthentication())->getUsername();

        if (!$userLogged)
            return false;

        $productModel = new ProductModel();
        $productIsExist = $productModel->productExistByProductId($productId);

        if (!$productIsExist)
            return false;

        $customerFavoriteModel = new CustomerProductLikeModel();
        $productStatModel = new ProductStatModel();

        $connection = $customerFavoriteModel->getConnection();
        $connection->beginTransaction();
        $status["status"] = 0;

        try {

            $status = $customerFavoriteModel->likeToggle($userLogged, $productId);

            if (!$status["status"])
                throw new Exception("");

            if ($status["action"] === "delete")
                $status["status"] = $productStatModel->minesLike($productId);

            if ($status["action"] === "add")
                $status["status"] = $productStatModel->plusLike($productId);

            if (!$status["status"])
                throw new Exception("");

            $connection->commit();
        }catch (Exception $e){
echo $e->getMessage();
            $connection->rollback();
        }

        return $status["status"];
    }
}