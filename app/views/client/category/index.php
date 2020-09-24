<section class="selected-products-wrapper pb-0">

    <header>
        <h2 class="category-title"><a href="/category/<?= $categoryID ?>"><?= $categoryName ?></a></h2>
    </header>


    <div class="row">
    <?php


    if (!count($products)){

        if (count($categories[$categoryID - 1]['subCategories'])) {

            $subcategoriesHtml = "<div class='categories-list'>";
            foreach ($categories[$categoryID - 1]['subCategories'] as $sub) {
                $subCatId = $sub['id'];
                $subCatTitle = $sub['title'];

                $subcategoriesHtml .= "<a class='buy-btn' href='/category/$categoryID/$subCatId'><span class='btn'>$subCatTitle</span></a>";
            }
            echo $subcategoriesHtml .="</div>";
        } else {

            echo "کالایی در این دسته بندی وجود ندارد!";
        }
    } else {
        foreach ($products as $product) {
            $productId = $product['id'];

            $productImage= '/files/' . $product['img_src'];
            $productImageAlt= $product['img_alt'];

            $productTitle = $product['title'];
            $productSellPrice = number_format($product['sell_price']);
            $productDescription = "";
            $view = $product['stat_view'] ?? 0;
            $buy = $product['stat_buy'] ?? 0;
            $like = $product['stat_like'] ?? 0;
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
                    <a class='buy-btn' href='product/$productId'>
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
    <?php
        if (isset($pager)) {
            echo "<div class='pager-wrapper'>$pager</div>";
        }
    ?>
</section>