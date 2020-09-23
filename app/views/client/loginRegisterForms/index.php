<?php

try {
    require_once "form.php";
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


                <ul class="nav nav-tabs nav-justified md-tabs default-color" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login-form" role="tab" aria-controls="login-form"
                           aria-selected="true">ورود به حساب کاربری</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-form" role="tab" aria-controls="register-form"
                           aria-selected="false">ثبت نام جدید</a>
                    </li>
                </ul>
                <div class="tab-content card pt-5" id="myTabContentJust">
                    <div class="tab-pane fade show active form-wrapper" id="login-form" role="tabpanel" aria-labelledby="login-tab">
                        <header>
                            <h2 class="category-title">به فروشگاه ما خوش آمدید!</h2>
                        </header>

                        <?= $loginForm->getForm(); ?>
                    </div>
                    <div class="tab-pane fade form-wrapper" id="register-form" role="tabpanel" aria-labelledby="register-tab">
                        <header>
                            <h2 class="category-title">ثبت نام در فروشگاه</h2>
                        </header>

                        <?= $registerForm->getForm(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>