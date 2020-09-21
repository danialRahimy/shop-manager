<section class="selected-products-wrapper pb-0">

    <header>
        <h2 class="category-title"><a href="/category/<?= $categoryID ?>"><?= $categoryName ?></a></h2>
    </header>

    <div class="row">
    <?php

    if (!count($products)){

        echo "کالایی در این دسته بندی وجود ندارد!";
    } else {

        foreach ($products as $product) {
            $productId = $product['id'];

            $productImage= '/files/' . $product['img_src'];
            $productImageAlt= $product['img_alt'];

            $productTitle = $product['title'];
            $productSellPrice = number_format($product['sell_price']);
            $productDescription = "";

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
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    160
                                </div>
                            </li>
                        </ul>
                    </div>
HTML;

            $product["operation"] = "
                    <a class='bookmark-action' href='/bookmark/$productId'>
                        <span>علاقه مندی</span>
                        <i class='fa fa-bookmark-o'></i>
                    </a>
                    <a class='buy-btn' href='/add-to-cart/$productId'>
                        <span class='btn'>خرید</span>
                    </a>
                    <a class='share-action' href='/product/$productId'>
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
    <?php
        if (isset($pager)) {
            echo "<div class='pager-wrapper'>$pager</div>";
        }
    ?>
</section>