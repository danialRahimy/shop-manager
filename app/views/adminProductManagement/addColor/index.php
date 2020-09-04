<?php

require_once "form.php";

if ($form->isSubmit()){

    if ($form->isValid()){

        require_once "formSubmit.php";
    }else{

        echo $form->getErrorMessage();
    }
}

echo $form->getForm();