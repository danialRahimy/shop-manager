<?php

    foreach ($categories as $category) {

        $categoryTitle = $category['title'];
        $categoryId = $category['id'];
        ?>

        <section class="selected-products-wrapper">
            <header>
                <h2 class="category-title"><a href="<?= $categoryId ?>"><?= $categoryTitle ?></a></h2>
            </header>
            <div class="row">

            <?php

                $products = $category['selected-products'];

                $startIndex = array_key_first($products);

                $count = count($products);
                if($count > 4) {
                    $counter = 4 + $startIndex;
                } else {
                    $counter = $count + $startIndex;
                }

                for($i = $startIndex; $i < $counter; $i++) {

                        $productId = $products[$i]['product-details']['id'];

                        $productImage= '/files/' . $products[$i]['product-details']['img_src'];
                        $productImageAlt= $products[$i]['product-details']['img_alt'];

                        $productTitle = $products[$i]['product-details']['title'];
                        $productSellPrice = number_format($products[$i]['product-details']['sell_price']);
                        $view = $products[$i]['product-details']['stat_view'] ?? 0;
                        $buy = $products[$i]['product-details']['stat_buy'] ?? 0;
                        $like = $products[$i]['product-details']['stat_like'] ?? 0;

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

                    $favoriteClass = ($products[$i]['product-details']['is_favorite']) ? "fa-bookmark" : "fa-bookmark-o";
                    $products[$i]["operation"] = "
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

                        $cardOperations = '<div class="card-body card-operation">'. $products[$i]['operation'] . '</div>';

                        $card = <<<HTML
                        <div class="col-3">
                            <div class="card">
                                $cardImage
                                $cardBody
                                $cardOperations
                            </div>
                        </div>
HTML;

                        echo $card;
                    }
            ?>

            </div>
        </section>

<?php } ?>