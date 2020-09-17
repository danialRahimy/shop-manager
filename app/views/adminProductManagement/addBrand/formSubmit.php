<?php

$data = array(
    "title_fa" => $newBrandTitleFA,
    "title_en" => $newBrandTitleEN
);

$model = new BrandModel();
$select = $model->select($data);

if (is_array($select) and count($select) > 0){

    echo "<div class='alert alert-danger'>امکان ثبت برند تکراری وجود ندارد</div>";
}else{
    $status = false;
    $connection = $model->getSql()->getAdapter()->getDriver()->getConnection();
    $connection->beginTransaction();

    try {

        $contentManager = new Content();
        $path = "/AdminProductManagementController/brand";
        $types = array(
            ".jpg", ".jpeg", ".jfif", ".pjpeg", ".pjp", ".png"
        );
        $fileName = $contentManager->add("logo_src", $path, $types, 1024, Content::IMAGE);
        $data["logo_src"] = $fileName;
        $status = $model->insert($data);
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
            echo "<div class='alert alert-success'>برند جدید با موفقیت افزوده شد</div>";
    }
}