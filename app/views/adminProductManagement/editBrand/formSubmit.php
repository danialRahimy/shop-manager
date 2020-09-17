<?php
$data = array(
    "title_fa" => $newBrandTitleFA,
    "title_en" => $newBrandTitleEN,
    "logo_src" => $newBrandLogo
);
$dataId = array(
    "id" => $editingBrandId
);

$model = new BrandModel();

$select = $model->select($dataId);
$select = $select[0];


$status = false;
$connection = $model->getSql()->getAdapter()->getDriver()->getConnection();
$connection->beginTransaction();

try {

    $contentManager = new Content();
    $path = "/AdminProductManagementController/brand";
    $types = array(
        ".jpg", ".jpeg", ".jfif", ".pjpeg", ".pjp", ".png"
    );

    $fileName = $contentManager->add("logo_src", $path, $types, 9999, Content::IMAGE);
    $data["logo_src"] = $fileName;
    $status = $model->update($data, $dataId);
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