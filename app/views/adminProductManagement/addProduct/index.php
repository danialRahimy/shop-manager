<?php



require_once "form.php";

$categoriesJson = json_encode($categories, JSON_UNESCAPED_UNICODE | JSON_OBJECT_AS_ARRAY);
$jsVariables = "<script>
    var categories = $categoriesJson;
</script>";

echo $jsVariables;

if ($form->isSubmit() and $form->isValid()){
    print_r($_POST);
    require_once "formSubmit.php";

}else{
    echo $form->isValid() ? "valid" : "invalid";
    echo $form->isSubmit() ? "Submit" : "inSubmit";
    echo $form->getErrorMessage();
}