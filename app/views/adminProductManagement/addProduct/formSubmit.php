<?php


$contentManager = new Content();

$types = array(
    ".jpg", ".jpeg", ".jfif", ".pjpeg", ".pjp", ".png"
);echo 11;
try {
    $fileName = $contentManager->add("image", "/product", $types, 2048, Content::IMAGE);

}catch (Exception $e){
    echo $e->getMessage();
}

echo $fileName;