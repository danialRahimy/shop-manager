<?php

$sidebarArray = array(
    array(
        "plugin-en" => "dashboard",
        "plugin-fa" => "داشبورد",
        "plugin-icon" => "fa-tachometer",
        "no-action" => "/admin/panel"
    ),
    array(
        "plugin-en" => "product",
        "plugin-fa" => "محصولات",
        "plugin-icon" => "fa-cubes",
        "actions" => array(
            "/admin/adminProductManagement/productsList" => "لیست محصولات",
            "/admin/adminProductManagement/addProduct" => "ثبت محصول جدید",
        )
    ),
    array(
        "plugin-en" => "category",
        "plugin-fa" => "موضوعات",
        "plugin-icon" => "fa-sitemap",
        "actions" => array(
            "/admin/adminProductManagement/categoriesList" => "لیست موضوعات",
            "/admin/adminProductManagement/addCategory" => "ثبت موضوع جدید",
        )
    ),
    array(
        "plugin-en" => "color",
        "plugin-fa" => "رنگ ها",
        "plugin-icon" => "fa-paint-brush",
        "actions" => array(
            "/admin/adminProductManagement/colorsList" => "لیست رنگ ها",
            "/admin/adminProductManagement/addColor" => "ثبت رنگ جدید",
        )
    ),
    array(
        "plugin-en" => "brand",
        "plugin-fa" => "برند ها",
        "plugin-icon" => "fa-trophy",
        "actions" => array(
            "/admin/adminProductManagement/brandsList" => "لیست برند ها",
            "/admin/adminProductManagement/addBrand" => "ثبت برند جدید",
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
                        <?php foreach ($pluginArray['actions'] as $url => $action) { ?>
                            <li>
                                <a href="<?= $url ?>"><?php echo $action; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <a href="<?= $pluginArray['no-action']; ?>">
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
            <a class="copyright" href="/">نمایش سایت</a>
        </li>
        <li>
            <a href="/admin/logout">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                خروج
            </a>
        </li>
    </ul>
</nav>