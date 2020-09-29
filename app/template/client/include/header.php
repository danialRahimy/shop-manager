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
            <a class="navbar-brand" href="/home">برند فروشگاه</a>

            <!-- menu -->
            <ul class="navbar-nav ml-auto top-menu-categories">
                <?php

                $categoriesInMenu = (new ClientMenuBuilder())->getMenu();

                      foreach ($categoriesInMenu as $category) {

                        $subCategories = $category['subCategories'];
                        $categoryTitle = $category['title'];
                        $categoryId = $category['id'];

                        if(count($subCategories)) {

                            $subCategoriesItems = '';
                            foreach ($subCategories as $subCategory) {

                                $id = $subCategory['id'];
                                $title = $subCategory['title'];
                                $subCategoriesItems .= "<a class='dropdown-item' href='/category/{$categoryId}/{$id}'>{$title}</a>";
                            }

                            $listItem = <<<HTML
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-{$categoryId}" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">$categoryTitle
                                </a>
                                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-{$categoryId}">
                                    $subCategoriesItems
                                </div>
                            </li>
HTML;
                        } else {
                            $listItem = <<<HTML
                                <li class="nav-item">
                                    <a class="nav-link" href="/category/{$categoryId}">$categoryTitle</a>
                                </li>
HTML;
                        }
                        echo $listItem;
                    }

//                    print_r($categorySubmitted);
                ?>
            </ul>

            <!-- search -->
<!--            <div class="col-4">-->
<!--                <form class="form-inline">-->
<!--                    <div class="md-form col-12 my-0">-->
<!--                        <input class="form-control white-placeholder mr-sm-2" type="text" placeholder="محصول دلخواهتو پیدا کن!" aria-label="Search">-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->

            <!-- user icons -->
            <ul class="navbar-nav mr-auto nav-flex-icons">

                <?php if(isset($_SESSION["client"]["user"]["username"])): ?>

                <li class="nav-item">
                    <a href="/cart" class="nav-link waves-effect waves-light">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>

                <li class="nav-item dropdown mr-1">
                    <a class="nav-link dropdown-toggle" id="user-profile-menu" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-default user-profile-menu"
                         aria-labelledby="user-profile-menu">
                        <a href="/user/profile" class="dropdown-item profile-details-link">
                            <span class="username">سلام <?= $_SESSION["client"]["user"]["username"]; ?> !</span>
                            <span>حساب کاربری</span>
                        </a>
                        <a class="dropdown-item" href="/user/orders">آخرین سفارشات</a>
                        <a class="dropdown-item" href="/user/logout">خروج از سایت</a>
                    </div>
                </li>

                <?php else: ?>
                    <li class="nav-item">
                        <a href="/cart" class="nav-link waves-effect waves-light">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item mr-2">
                        <a href="/login-register" class="nav-link waves-effect waves-light btn border-white">
                            <span class="login-label">ورود/ ایجاد به حساب کاربری</span>
                            <i class="fa fa-user"></i>
                        </a>
                    </li>

                <?php endif; ?>
            </ul>

        </nav>
        <!--/.Navbar-->
    </header>