<?php

$sidebarArray = array(
    array(
        "plugin-en" => "dashboard",
        "plugin-fa" => "داشبورد",
        "plugin-icon" => "fa-tachometer"
    ),
    array(
        "plugin-en" => "product",
        "plugin-fa" => "محصولات",
        "plugin-icon" => "fa-cart-arrow-down",
        "actions" => array(
            "product-list" => "لیست محصولات",
            "submit-product" => "ثبت محصول جدید",
            "categories" => "دسته بندی ها",
            "brand" => "برندها",
            "copen" => "کوپن ها"
        )
    ),
    array(
        "plugin-en" => "order",
        "plugin-fa" => "سفارشات",
        "plugin-icon" => "fa-tachometer",
        "actions" => array(
            "history" => "تاریخچه صفارشات",
            "reject" => "درخواست مرجوعی"
        )
    ),
    array(
        "plugin-en" => "statics",
        "plugin-fa" => "گزارش عملکرد",
        "plugin-icon" => "fa-line-chart"
    ),
    array(
        "plugin-en" => "userManagement",
        "plugin-fa" => "مدیریت کاربران",
        "plugin-icon" => "fa-users",
        "actions" => array(
            "special" => "مشتریان ویژه",
            "new-customer" => "مشتریان جدید",
            "new-user" => "کاربران جدید",
            "send-email" => "ارسال ایمیل"
        )
    ),
    array(
        "plugin-en" => "dashboard",
        "plugin-fa" => "داشبورد",
        "plugin-icon" => "fa-tachometer",
        "actions" => array(

        )
    ),
    array(
        "plugin-en" => "commentManagement",
        "plugin-fa" => "مدیریت نظرات",
        "plugin-icon" => "fa-comments-o"
    ),
    array(
        "plugin-en" => "customerService",
        "plugin-fa" => "پشتیبانی",
        "plugin-icon" => "fa-volume-control-phone reflectTransform"
    ),
    array(
        "plugin-en" => "teammate",
        "plugin-fa" => "همکاران",
        "plugin-icon" => "fa-handshake-o"
    ),
    array(
        "plugin-en" => "sitting",
        "plugin-fa" => "تنظیمات سایت",
        "plugin-icon" => "fa-cog",
        "actions" => array(
            "layout" => "تنظیمات قالب",
            "section" => "تنظیمات قسمت ها",
            "adv" => "تبلیغات",
            "pageManagement" => "مدیریت برگه ها"
        )
    )
);
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>فروشگاه آنلاین</h3>
        <strong>لوگو</strong>
    </div>

    <?php if(!empty($sidebarArray)) { ?>
    <ul class="list-unstyled components">
        <?php foreach ($sidebarArray as $pluginArray) { ?>
            <li>
                <?php if(!empty($pluginArray['actions'])) { ?>
                    <a aria-expanded="false" class="dropdown-toggle" data-toggle="collapse" href="#<?php echo $pluginArray['plugin-en']; ?>SubMenu">
                        <i class="fa <?php echo $pluginArray['plugin-icon']; ?>" aria-hidden="true"></i>
                        <?php echo $pluginArray['plugin-fa']; ?>
                    </a>
                    <ul class="collapse list-unstyled" id="<?php echo $pluginArray['plugin-en']; ?>SubMenu">
                        <?php foreach ($pluginArray['actions'] as $action) { ?>
                            <li>
                                <a href="#"><?php echo $action; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <a href="#">
                        <i class="fa <?php echo $pluginArray['plugin-icon']; ?>" aria-hidden="true"></i>
                        <?php echo $pluginArray['plugin-fa']; ?>
                    </a>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
    <?php } ?>

    <ul class="list-unstyled CTAs">
        <li>
            <a class="copyright" href="#">نمایش سایت</a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                خروج
            </a>
        </li>
    </ul>
</nav>