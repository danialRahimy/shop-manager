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
                                <h3 class="card-title font-weight-bold"><a href="#">$productTitle</a></h3>
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

                    $products[$i]["operation"] = "
                            <a class='bookmark-action' href='/admin/adminProductManagement/editingBrand/$productId'>
                                <span>علاقه مندی</span>
                                <i class='fa fa-bookmark-o'></i>
                            </a>
                            <a class='buy-btn' href='/admin/adminProductManagement/editingBrand/$productId'>
                                <span class='btn'>خرید</span>
                            </a>
                            <a class='share-action' href='/admin/adminProductManagement/deletingBrand/$productId'>
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