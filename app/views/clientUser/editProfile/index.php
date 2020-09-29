<?php

    //customer information
    $customerID = $customer['id'];
    $customerName = $customer['name'] ?? '';
    $customerFamily = $customer['family'] ?? '';
    $customerUsername = $customer['username'];
    $customerEmail = $customer['email'];
    $customerCellNumber = $customer['cell_number'];
    $customerCreditCard = $customer['credit_card'];

    require_once 'form.php';

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
                <h2 class="category-title">ویرایش اطلاعات شخصی</h2>
            </header>

            <div class="edit-profile-form">
                <?= $form->getForm(); ?>
            </div>

        </section>

    </main>
</div>
