<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <link rel="stylesheet" href="./../assets/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/lib/font-awesome.min.css">
    <link rel="stylesheet" href="./../assets/css/lib/owl.carousel.min.css">
    <link rel="stylesheet" href="./../assets/css/lib/owl.theme.default.min.css">
    <link rel="stylesheet" href="./../assets/css/fonts.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./../assets/css/admin-styles.css">

    <title>dashboard</title>
</head>

<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <?php require_once 'sidebar.php'?>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button class="btn btn-info" id="sidebarCollapse" type="button">
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="btn btn-dark d-inline-block d-lg-none ml-auto" data-target="#navbarSupportedContent"
                        data-toggle="collapse" type="button">
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link mt3" href="#">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt3" href="#">
                                <i class="fa fa-bell-o" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan">
                                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="جستجو"
                                       aria-label="Search">
                                <button type="submit" name="searchBtn" class="iconBtn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>