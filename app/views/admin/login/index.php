<?php

try {
    require_once "formSubmit.php";
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
    <?php require_once TEMPLATE_PATH . "/admin/include/meta.php" ?>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto pt-5">
                <?php if (isset($alert)){
                    echo <<<HTML
                    <div class="alert alert-danger"> $alert </div>
HTML;
                    }
                ?>

                <form method="post">
                    <div class="form-group">
                        <label for="email">آدرس ایمیل یا نام کاربری</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">رمز عبور</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">ورود</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>