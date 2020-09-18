<!doctype html>
    <html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <?php require_once "meta.php"?>

        <title><?php echo $title = $title ?? "shop-manager";  ?></title>
    </head>

    <body id="<?php echo $pageID = $pageID ?? "";?>">

    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark default-color">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">برند فروشگاه</a>

            <!-- menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">مد و پوشاک
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">لوازم خانگی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">دسته بندی</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">کالای دیجیتال
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">گوشی موبایل</a>
                        <a class="dropdown-item" href="#">لپ تاپ</a>
                        <a class="dropdown-item" href="#">لوازم جانبی</a>
                    </div>
                </li>

            </ul>

            <!-- search -->
            <div class="col-4">
                <form class="form-inline">
                    <div class="md-form col-12 my-0">
                        <input class="form-control white-placeholder mr-sm-2" type="text" placeholder="محصول دلخواهتو پیدا کن!" aria-label="Search">
                    </div>
                </form>
            </div>

            <!-- user icons -->
            <ul class="navbar-nav mr-auto nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-default"
                         aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!--/.Navbar-->
    </header>