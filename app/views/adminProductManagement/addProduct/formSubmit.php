<?php


if ($newProductSubCategory == 0) {
    $finalProductCategory = $newProductCategory;
} else {
    $finalProductCategory = $newProductSubCategory;
}

$time = time();

$a = ['رسول بسامی', 'دانیال رحیمی'];
$author = $a[mt_rand(0, count($a) - 1)];

$productData = array(
    "title" => $newProductTitleFA,
    "title_en" => $newProductTitleEN,
    "description" => $newProductDescription,
    "category_id" => $finalProductCategory,
    "sell_price" => $newProductSellPrice,
    "quantity" => $newProductQuantity,
    "brand_id" => $newProductBrand,
    "flags" => $newProductPublish,
    "created_by" => $author,
    "created_at" => $time,
);

$productName = array(
    "title" => $newProductTitleFA,
    "title_en" => $newProductTitleEN
    );

$productModel = new ProductModel();
$select = $productModel->select($productName);


if (is_array($select) and count($select) > 0){

    echo "<div class='alert alert-danger'>امکان ثبت محصول تکراری وجود ندارد</div>";
}else{
    $status = false;
    $connection = $productModel->getSql()->getAdapter()->getDriver()->getConnection();
    $connection->beginTransaction();

    try {

        $status = $productModel->insert($productData);
        $productId = $productModel->getAdapter()->getDriver()->getConnection()->getLastGeneratedValue();

        $contentManager = new Content();
        $path = "/AdminProductManagementController/product";

        $types = array(
            ".jpg", ".jpeg", ".jfif", ".pjpeg", ".pjp", ".png"
        );

        $fileName = $contentManager->add("image", $path, $types, 2048, Content::IMAGE);

        $productImageData = array(
            "product_id" => $productId,
            "src" => $fileName,
            "alt" => $newProductAlt
        );
        $imageModel = new ProductImageModel();
        $status = $imageModel->insert($productImageData);

        $productRelationColorData = array(
            "color_id" => $newProductColor,
            "product_id" => $productId
        );
        $colorModel = new ProductRelationColorModel();
        $status = $colorModel->insert($productRelationColorData);

        $connection->commit();
    }catch (ExceptionUser $e){
        $errorMessage = $e->getMessage();
        echo "<div class='alert alert-danger'>$errorMessage</div>";
        $connection->rollback();
    }catch (Exception $e){

        echo $e->getMessage();
        $connection->rollback();
    }

    if (!$status and !$errorMessage){

        echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
    }else{
        if (!isset($errorMessage))
            echo "<div class='alert alert-success'>محصول جدید با موفقیت افزوده شد</div>";
    }
}