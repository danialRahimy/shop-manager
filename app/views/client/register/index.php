<?php
try {
    require_once "form.php";

    if ($registerForm->isSubmit()){

        if ($registerForm->isValid()){

            require_once "formSubmit.php";
        }else{

            echo $registerForm->getErrorMessage();
        }
    }
}catch (ExceptionUser $error){
    $alert = $error->getMessage();
}


?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once TEMPLATE_PATH . "/client/include/meta.php" ?>

    <title><?php echo $title = $title ?? "shop-manager";  ?></title>
</head>

<body id="<?php echo $pageID = $pageID ?? "";?>">
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto pt-5">
                <?php if (isset($alert)){
                    echo <<<HTML
                    <div class="alert alert-danger"> $alert </div>
HTML;
                    }
                ?>

                <div class="card">
                    <div class="form-wrapper">
                        <div class="md-tabs default-color mb-4">
                            <span class="register-title">ثبت نام در سایت</span>
                        </div>
                        <?= $registerForm->getForm(); ?>
                        <div class="havent-account mt-4">
                            <span class="px-1">حساب کاربری دارید؟</span>
                            <a href="/login">هم اکنون وارد شوید.</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>
</html>