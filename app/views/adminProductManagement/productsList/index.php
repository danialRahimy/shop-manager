<?php

echo $pager;

$selectedData = array(
    "id" => "آی دی",
    "title" => "نام محصول",
    "title_en" => "نام انگلیسی",
    "category_id" => "دسته بندی",
    "brand_id" => "برند",
    "quantity" => "موجودی",
    "sell_price" => "قیمت فروش",
    "operation" => ""
);

//foreach ($products as $key => $record) {
//
//    $products[$key]["operation"] = "
//        <a class='admin-table-edit' href='/admin/adminProductManagement/editingBrand/$record[id]'>
//            <i class='fa fa-edit'></i>
//        </a>
//        <a class='admin-table-remove' href='/admin/adminProductManagement/deletingBrand/$record[id]'>
//            <i class='fa fa-trash-o'></i>
//        </a>
//    ";
//}

//$table = new AdminTableCreator(
//    $selectedData,
//    $products
//);
//
//echo "<a href='addBrand' class='btn btn-primary mb-2'>افزودن برند جدید</a>";
//echo $table->getTable();
?>

<section class="selectOptions">
    <div class="row">
        <div class="catSelect col-8 d-flex">
            <div class="form-group col-4">
                <label for="category">دسته مادر</label>
                <select class="form-control" id="category">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="sub-category">زیر دسته بندی</label>
                <select class="form-control" id="sub-category">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>

        <div class="searchAndFilter col-4 d-flex">
            <a class="filter-btn" data-toggle="collapse" data-target="#filters">
                <span>فیلتر</span>
                <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
            </a>

            <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="جستجو" aria-label="Search">
                <button type="submit" name="searchBtn" class="iconBtn">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
    <div id="filters" class="collapse">
        <a href="#" class="chip">جدیدترین</a>
        <a href="#" class="chip">جدیدترین</a>
        <a href="#" class="chip">پرفروش ترین</a>
        <a href="#" class="chip">کم فروش ترین</a>
        <a href="#" class="chip">محبوب ترین</a>
        <a href="#" class="chip">محصولات منتخب</a>
    </div>
</section>

<section class="cards row">

    <?php
        foreach ($products as $key => $record) {

            $productId = $products[$key]['id'];
            $productAvatar = $avatar[$key];
            $productAuthor = $products[$key]['created_by'];
            $productPublishDate = $products[$key]['created_at'];

            $productImage= $productImages[$productId]['src'];
            $productImageAlt= $productImages[$productId]['alt'];

            $productTitle = $products[$key]['title'];
            $productSellPrice = number_format($products[$key]['sell_price']);
            $productDescription = "";
//            $productDescription = html_entity_decode($products[$key]['description']);
//            if(strlen($productDescription) > 100){
//                $productDescription = substr($productDescription, 0, 99).' ...';
//            }
            $productPublishDate = $products[$key]['created_at'];
            $productPublishDate = $products[$key]['created_at'];
            $productPublishDate = $products[$key]['created_at'];


            $cardHeader = <<<HTML
                <div class="card-body d-flex flex-row">
                    <!-- Avatar -->
                    <img src="$productAvatar" class="rounded-circle ml-2" height="40px" width="40px" alt="avatar">
                    <div>
                        <!-- Title -->
                        <h4 class="card-title font-weight-bold  mb-0 mt-1">$productAuthor</h4>
                        <!-- date -->
                        <p class="card-text faNumber"><i class="fa fa-clock-o pl-1" aria-hidden="true"></i>$productPublishDate</p>
                    </div>
                </div>
HTML;

            $cardImage = <<<HTML
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top rounded-0" src="$productImage" alt="$productImageAlt">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
HTML;

            $cardBody = <<<HTML
                <!-- Card content -->
                <div class="card-body">
    
                    <!-- Title -->
                    <h4 class="card-title font-weight-bold"><a href="#">$productTitle</a></h4>
                    <!-- Data -->
                    <ul class="list-unstyled list-inline left-to-right rating mb-0">
                        <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-half-o amber-text"></i></li>
                        <li class="list-inline-item"><p class="text-muted faNumber mb-1">4.5 (413)</p></li>
                    </ul>
                    <p class="mb-1 card-price faNumber"><i class="fa fa-money ml-2" aria-hidden="true"></i>$productSellPrice<span class="badge badge-light mr-1 text-muted">تومان</span></p>
                    <!-- Text -->
                    <p class="card-text">$productDescription</p>
                    <hr class="my-2">
                    <ul class="list-unstyled list-inline d-flex justify-content-between faNumber mb-0">
                        <li class="list-inline-item mr-0">
                            <div class="chip mr-0">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                1325
                            </div>
                        </li>
                        <li class="list-inline-item mr-0">
                            <div class="chip mr-0">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                22268
                            </div>
                        </li>
                        <li class="list-inline-item mr-0">
                            <div class="chip mr-0">
                                <i class="fa fa-undo" aria-hidden="true"></i>
                                16
                            </div>
                        </li>
                    </ul>
                </div>
HTML;

            $products[$key]["operation"] = "
                <a class='admin-table-chart' href='/admin/adminProductManagement/editingBrand/$record[id]'>
                    <span>عملکرد</span>
                    <i class='fa fa-line-chart'></i>
                </a>
                <a class='admin-table-edit' href='/admin/adminProductManagement/editingBrand/$record[id]'>
                    <span>ویرایش</span>
                    <i class='fa fa-edit'></i>
                </a>
                <a class='admin-table-remove' href='/admin/adminProductManagement/deletingBrand/$record[id]'>
                    <span>حذف</span>
                    <i class='fa fa-trash-o'></i>
                </a> 
            ";

            $cardOperations = '<div class="card-body card-operation">'. $products[$key]['operation'] . '</div>';

            $card = <<<HTML
            <div class="col-3">
                <div class="card">
                    $cardHeader
                    $cardImage
                    $cardBody
                    $cardOperations
                </div>
            </div>
HTML;

            echo $card;
        }
    ?>

</section>