<?php

    //customer information
    $customerID = $customerOrders[0]['id'];
    $customerName = $customerOrders[0]['name'] ?? '';
    $customerFamily = $customerOrders[0]['family'] ?? '';
    $customerUsername = $customerOrders[0]['username'];
    $customerEmail = $customerOrders[0]['email'];
    $customerCellNumber = $customerOrders[0]['cell_number'];

    //create orders table
    $columnNames = array(
        "row" => "ردیف",
        "factor_id" => "شماره سفارش",
        "submission_date" => "تاریخ ثبت سفارش",
        "total" => "مبلغ کل",
        "payed" => "وضعیت پرداخت",
        "operation" => "جزئیات"
    );

    $counter = 0;
    foreach ($customerOrders as  $key => $record) {

        $customerOrders[$key]["submission_date"] = jdate("y/m/d", $customerOrders[$key]["submission_date"]);

        $customerOrders[$key]["total"] = number_format($customerOrders[$key]["total"]);

        if ($customerOrders[$key]["payed"] == 'Y') {

            $customerOrders[$key]["payed"] = "<span class='badge badge-pill badge-success p-2'>پرداخت موفق</span>";
        } else {
            $customerOrders[$key]["payed"] = "<span class='badge badge-pill badge-warning p-2'>پرداخت نشده</span>";
        }

        $customerOrders[$key]["operation"] = "
            <a class='order-detail-icon' href='/user/order-detail/$record[factor_id]'>
                <i class='fa fa-search-plus' aria-hidden='true'></i>
            </a>
        ";
        $customerOrders[$key]["row"] = ++$counter;
    }

    $table = new AdminTableCreator(
        $columnNames,
        $customerOrders
    );

?>
<div class="d-flex">
    <sidebar class="selected-products-wrapper col-2">
        <nav>
            <ul class="sidebar-list">
                <li>
                    <a href="/user/profile" class="dropdown-item profile-details-link">
                        <span class="username">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <?= $_SESSION["client"]["user"]["username"]; ?>
                        </span>
                        <span>حساب کاربری</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/user/orders">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        آخرین سفارشات
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/user/address">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i>
                        نشانی ها
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/user/logout">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        خروج از سایت
                    </a>
                </li>
            </ul>
        </nav>
    </sidebar>

    <main class="col-10">

        <section class="selected-products-wrapper">

            <header>
                <h2 class="category-title">اطلاعات شخصی</h2>
            </header>

            <div class="profile-preview row">
                <div class="col-6">
                    <span class="profile-preview-label">نام:</span>
                    <span class="profile-preview-item"><?= $customerName; ?></span>
                </div>
                <div class="col-6">
                    <span class="profile-preview-label">نام خانوادگی:</span>
                    <span class="profile-preview-item"><?= $customerFamily; ?></span>
                </div>
                <div class="col-6">
                    <span class="profile-preview-label">آدرس ایمیل:</span>
                    <span class="profile-preview-item"><?= $customerEmail; ?></span>
                </div>
                <div class="col-6">
                    <span class="profile-preview-label">تلفن همراه:</span>
                    <span class="profile-preview-item"><?= $customerCellNumber; ?></span>
                </div>
                <div class="col-12">
                    <a class="btn-outline-info btn" href="/user/edit-profile">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        ویرایش اطلاعات شخصی
                    </a>
                </div>
            </div>

        </section>

        <section class="selected-products-wrapper">

            <header>
                <h2 class="category-title">آخرین سفارش ها</h2>
            </header>

            <div class="orders-table fa-number">
                <?= $table->getTable(); ?>
            </div>

        </section>

    </main>
</div>
