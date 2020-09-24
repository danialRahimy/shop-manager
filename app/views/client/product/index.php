<?php
    $productID = $product['id'];
    $productTitleFA = $product['title'];
    $productTitleEN = $product['title_en'] ?? '';
    $productImageSrc = '/files/' . $product['img_src'];
    $productImageAlt = $product['img_alt'];
    $productBrandName = $product['brand_title'];
    $productBrandID = $product['brand_id'];
    $productCategoryName = $product['category_title'];
    $productCategoryID = $product['category_id'];
    $productColor = $product['hex_code']  ?? '';
    $productPrice = $product['sell_price']  ?? '';
    $productDescription = $product['description'];
    $favoriteClass = ($product['is_favorite']) ? "fa-bookmark" : "fa-bookmark-o";
    $likeClass = ($product['stat_like']) ? "fa-heart" : "fa-heart-o";
    $like = $product['stat_like'] ?? 0;
?>

<article class="selected-products-wrapper">

    <div class="row">

        <div class="col-6 row">
            <div class="col-1 product-actions">
                <a class="bookmark-action" data-favorite data-product-id="<?= $productID ?>">
                    <span>علاقه مندی</span>
                    <i class="fa <?= $favoriteClass ?>"></i>
                </a>
                <a class="bookmark-action" data-like data-product-id="<?= $productID ?>">
                    <span>پسندیدن</span>
                    <i class="fa <?= $likeClass ?>"></i>
                </a>
                <a class="share-action" href="/product/<?= $productID ?>">
                    <span>اشتراک</span>
                    <i class="fa fa-share-alt"></i>
                </a>
            </div>
            <div class="col-11">
                <img class="card-img-top" src="<?= $productImageSrc ?>" alt="<?= $productImageAlt ?>">
            </div>
        </div>

        <div class="col-6">

                <div class="card-body">
                    <!-- Title -->
                    <h1 class="product-title"><?= $productTitleFA ?></h1>
                    <h2 class="product-title-en"><?= $productTitleEN ?></h2>
                    <div class="product-statics">
                        <div class="statics-item">
                            <ul class="list-unstyled list-inline left-to-right rating mb-0">
                                <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                                <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                                <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                                <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star-half-o amber-text"></i></li>
                                <li class="list-inline-item"><p class="text-muted fa-number mb-1">4.5 (413)</p></li>
                            </ul>
                        </div>
                        <div class="statics-item">
                            <a class="bookmark-action" href="/product/<?= $productID ?>/#comments">
                                <span class="fa-number">42</span>
                                <i class="fa fa-comments-o"></i>
                            </a>
                        </div>
                        <div class="statics-item">
                            <a class="bookmark-action" href="#">
                                <span class="fa-number"><?= $like ?></span>
                                <i class="fa fa-thumbs-o-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="cat-and-brand">
                        <div>برند :
                            <a href="/brands/<?= $productBrandID ?>"><?= $productBrandName ?></a>
                        </div>
                        <div>دسته‌بندی :
                            <a href="/category/<?= $productCategoryID ?>"><?= $productCategoryName ?></a>
                        </div>
                    </div>
                    <!-- Text -->
                    <div class="product-colors">
                        <span class='color-label'>رنگ:</span>
                        <span class="color" style="background-color: <?= $productColor ?>"></span>
                    </div>

                    <p class="product-price fa-number">
                        <span class='price-label'>قیمت:</span>
                        <?= $productPrice ?>
                        <span class="badge badge-light mr-1 text-muted">تومان</span>
                    </p>

                    <a class="buy-btn" href="/add-to-cart/<?= $productID ?>">
                        <span class="btn">
                            افزودن به سبد خرید
                            <i class="fa fa-shopping-cart px-2"></i>
                        </span>
                    </a>
                </div>

            <!-- Card -->
        </div>

    </div>

    <div class="row product-description">
        <h2>        نقد و بررسی اجمالی Nikon D5300 kit 18-140 VR Digital Camera
        </h2>
        <p>
            اواخر سال 2013 و در حالی که کمتر از یک سال از معرفی DSLR سطح مبتدی نیکون به نام D5200 می گذشت، این شرکت مدل D5300 را معرفی کرد. D5300 را باید DSLR ی دانست که بین مدل های D7100 و D3300 قرار می گیرد. رقیب اصلی آن نیز دوربین 700D کانن است. یکی دو سال پیش نیکون نهضتی را آغاز کرد برای حذف فیلتر Low Pass از روی سنسور تصویر DSLR های خود. نخستین بار این کار را در دوربین D800E انجام داد و سپس D7100 و اکنون D5300. پس از آن هم در دوربین D3300 که در ژانویه ی 2014 معرفی شد، همین کار را تکرار کرد. تاثیر شگرف این حذف فیلتر را در D7100 به خوبی مشاهده کردیم. به صورتی که می توان گفت عکس هایی بهتر از 70D کانن می گیرد و در ضمن به دلیل امکانات و بدنه ی بهتری که دارد، با توجه به اینکه قیمت آن ها خیلی نزدیک است، برای کسانی که برند برای آن ها تفاوت ندارد و چندان هم در کار فیلم برداری نیستند، D7100 انتخابی بهتر نسبت به 70D است. به نظر می رسد سنسوری که در D5300 به کار رفته، مشابه همان سنسور 24 مگاپیکسلی D7100 باشد.
        </p>
    </div>

</article>

<!-- related products -->
<section class="selected-products-wrapper">

    <header>
        <h2 class="category-title">محصولات مرتبط</h2>
    </header>

    <div class="row">
        <?php

        if (!count($relatedProducts)){

            echo "کالایی در این دسته بندی وجود ندارد!";
        } else {

            foreach ($relatedProducts as $product) {
                $productId = $product['id'];

                $productImage= '/files/' . $product['img_src'];
                $productImageAlt= $product['img_alt'];

                $productTitle = $product['title'];
                $productSellPrice = number_format($product['sell_price']);
                $productDescription = "";
                $like = $product['stat_like'] ?? 0;
                $view = $product['stat_view'] ?? 0;
                $buy = $product['stat_buy'] ?? 0;
                $favoriteClass = ($product['is_favorite']) ? "fa-bookmark" : "fa-bookmark-o";

                $cardImage = <<<HTML
                    <!-- Card image -->
                    <div class="view overlay">
                        <img class="card-img-top rounded-0" src="$productImage" alt="$productImageAlt">
                        <a href="/product/$productId">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
HTML;

                $cardBody = <<<HTML
                    <!-- Card content -->
                    <div class="card-body">
        
                        <!-- Title -->
                        <h3 class="card-title font-weight-bold"><a href="/product/$productId">$productTitle</a></h3>
                        <!-- Data -->
                        <ul class="list-unstyled list-inline left-to-right rating mb-0">
                            <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star amber-text"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star-half-o amber-text"></i></li>
                            <li class="list-inline-item"><p class="text-muted fa-number mb-1">4.5 (413)</p></li>
                        </ul>
                        <p class="mb-1 card-price fa-number">$productSellPrice<span class="badge badge-light mr-1 text-muted">تومان</span></p>
                        <!-- Text -->
                        <p class="card-text">$productDescription</p>
                        <hr class="my-2">
                        <ul class="list-unstyled px-1 list-inline d-flex justify-content-between fa-number mb-0">
                            <li class="list-inline-item mr-0">
                                <div class="chip mr-0">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    {$buy}
                                </div>
                            </li>
                            <li class="list-inline-item mr-0">
                                <div class="chip mr-0">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    {$view}
                                </div>
                            </li>
                            <li class="list-inline-item mr-0">
                                <div class="chip mr-0">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    {$like}
                                </div>
                            </li>
                        </ul>
                    </div>
HTML;

                $product["operation"] = "
                    <a class='bookmark-action' data-favorite data-product-id='$productId'>
                        <span>علاقه مندی</span>
                        <i class='fa {$favoriteClass}'></i>
                    </a>
                    <a class='buy-btn' href='/product/$productId'>
                        <span class='btn'>خرید</span>
                    </a>
                    <a class='share-action' href='#'>
                        <span>اشتراک</span>
                        <i class='fa fa-share-alt'></i>
                    </a> 
                ";

                $cardOperations = '<div class="card-body card-operation">'. $product['operation'] . '</div>';

                $card = <<<HTML
                <div class="col-3 mb-4">
                    <div class="card">
                        $cardImage
                        $cardBody
                        $cardOperations
                    </div>
                </div>
HTML;

                echo $card;
            }
        }

        ?>

    </div>

</section>
