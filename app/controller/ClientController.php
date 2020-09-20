<?php


class ClientController extends BaseController
{

    public function indexAction()
    {
        $productModel = new ProductModel();
        $select = $productModel->getSql()->select();

        $categorySelect = (new CategoryModel())->getSql()->select();
        $categorySelect->where(array("show_in_menu" => "Y"));

        $select->join(
            array("C" => $categorySelect),
            TB_PRODUCT . ".category_id = C.id",
            array(
                "category_id" => "id",
                "category_title" => "title"
            ),
            $select::JOIN_LEFT
        );

        $select->join(
            array("I" => TB_PRODUCT_IMAGE),
            TB_PRODUCT . ".id = I.product_id",
            array(
                "img_src" => "src",
                "img_alt" => "alt"
            ),
            $select::JOIN_LEFT
        );

        $productsResultSet = $productModel->selectWith($select);
        $products = $productsResultSet->toArray();

        $categoriesSet = (new CategoryModel())->getActiveCategory();

        $i = 0;
        $categories = array();
        foreach ($categoriesSet as $category) {

            if ($category['parent_id'] == 0 and $category['show_in_menu'] == 'Y') {
                $categories[$i]['title'] = $category['title'];
                $categories[$i]['id'] = $category['id'];

                $thisCategoryAndItsChildIds = array();
                $thisCategoryAndItsChildIds[] = $category['id'];
                $subCategories = array();
                $j = 0;
                foreach ($categoriesSet as $category2) {

                    if ($category2['parent_id'] == $categories[$i]['id']) {
                        $subCategories[$j]['title'] = $category2['title'];
                        $subCategories[$j]['id'] = $category2['id'];
                        $thisCategoryAndItsChildIds[] = $category2['id'];
                    }
                    $j++;
                }
                $categories[$i]['subCategories'] = $subCategories;

                $selectedProducts = array();
                $k = 0;
                foreach($products as $product) {

                    if (in_array($product['category_id'], $thisCategoryAndItsChildIds)) {
                        $selectedProducts[$k]['product-details'] = $product;
                    }
                    $k++;
                };
                $categories[$i]['selected-products'] = $selectedProducts;
            }
            $i++;
        }

        $this->view->categories = $categories;

        $this->view->pageID = "home-page";
        $this->view->title = "برند فروشگاه";
        echo $this->view->render("client");
    }

    public function categoryAction($params = array())
    {
        $categoryID = (int) $params['catID'];

        //preparing categories data and their subCategories array
        $categoriesSet = (new CategoryModel())->getActiveCategory();

        $i = 0;
        $categories = array();
        foreach ($categoriesSet as $category) {

            if ($category['parent_id'] == 0) {

                $categories[$i]['title'] = $category['title'];
                $categories[$i]['id'] = $category['id'];

                $thisCategoryAndItsChildIds = array();
                $thisCategoryAndItsChildIds[] = $category['id'];
                $subCategories = array();
                $j = 0;
                foreach ($categoriesSet as $category2) {

                    if ($category2['parent_id'] == $categories[$i]['id']) {

                        $subCategories[$j]['title'] = $category2['title'];
                        $subCategories[$j]['id'] = $category2['id'];
                        $thisCategoryAndItsChildIds[] = $category2['id'];
                    }
                    $j++;
                }
                $categories[$i]['subCategories'] = $subCategories;
            }
            $i++;
        }


        // calculate number of products in this subCategory
        $productModel = new ProductModel();

        $select = $productModel->getSql()->select();
        $select->where(array("category_id" => $categoryID));
        $allProduct = $productModel->selectWith($select);
        $allProduct = $allProduct->toArray();
        $productCount = count($allProduct);

        // build pager
        $pageId = $this->getRequest("pageId", 1);
        $perPage = 2;
        $pagerObj = new AdminPager(array(
            "count" => $productCount,
            "perPage" => $perPage,
            "currentPage" => $pageId
        ));

        // fetch products in this category
        $categorySelect = (new CategoryModel())->getSql()->select();
        $categorySelect->where(array("id" => $categoryID, "show_in_menu" => "Y"));

        $select->join(
            array("C" => $categorySelect),
            TB_PRODUCT . ".category_id = C.id",
            array(
                "category_id" => "id",
                "category_title" => "title"
            ),
            $select::JOIN_INNER
        );

        $select->join(
            array("I" => TB_PRODUCT_IMAGE),
            TB_PRODUCT . ".id = I.product_id",
            array(
                "img_src" => "src",
                "img_alt" => "alt"
            ),
            $select::JOIN_LEFT
        );

        $select->limit($perPage);
        $select->offset(((((int) $pageId) - 1) * $perPage ));
        $select->order('id DESC');

        $productsResultSet = $productModel->selectWith($select);
        $products = $productsResultSet->toArray();


        //sending data to view
        $this->view->categoryID = $categoryID;
        $this->view->categoryName = $categoriesSet[$categoryID - 1]['title'];
        $this->view->categories = $categories;
        $this->view->products = $products;

        if ($perPage < $productCount)
            $this->view->pager = $pagerObj->getPager();

        $this->view->pageID = "category" . $categoryID;
        $this->view->title = $categoriesSet[$categoryID - 1]['title'] . " - برند فروشگاه";
        echo $this->view->render("client");
    }

    public function subCategoryAction($params = array())
    {
        $categoryId = (int) $params['catID'];
        $subCategoryId = (int) $params['subCatID'];

        $categoriesSet = (new CategoryModel())->getActiveCategory();

        //preparing categories data and their subCategories array
        $i = 0;
        $categories = array();
        foreach ($categoriesSet as $category) {

            if ($category['parent_id'] == 0) {
                $categories[$i]['title'] = $category['title'];
                $categories[$i]['id'] = $category['id'];

                $thisCategoryAndItsChildIds = array();
                $thisCategoryAndItsChildIds[] = $category['id'];
                $subCategories = array();
                $j = 0;
                foreach ($categoriesSet as $category2) {

                    if ($category2['parent_id'] == $categories[$i]['id']) {
                        $subCategories[$j]['title'] = $category2['title'];
                        $subCategories[$j]['id'] = $category2['id'];
                        $thisCategoryAndItsChildIds[] = $category2['id'];
                    }
                    $j++;
                }
                $categories[$i]['subCategories'] = $subCategories;

            }
            $i++;
        }

        // check this subCatId is really subCategory of catId or not
        $trueUri = false;
        foreach ($categories[$categoryId - 1]['subCategories'] as $subCat) {
            if ($subCat['id'] == $subCategoryId)
                $trueUri = true;
        }
        if (!$trueUri)
            die('404, page not found!');


        // calculate number of products in this subCategory
        $productModel = new ProductModel();

        $select = $productModel->getSql()->select();
        $select->where(array("category_id" => $subCategoryId));
        $allProduct = $productModel->selectWith($select);
        $allProduct = $allProduct->toArray();
        $productCount = count($allProduct);

        // build pager
        $pageId = $this->getRequest("pageId", 1);
        $perPage = 2;
        $pagerObj = new AdminPager(array(
            "count" => $productCount,
            "perPage" => $perPage,
            "currentPage" => $pageId
        ));

        // fetch products in this subCategory
        $categorySelect = (new CategoryModel())->getSql()->select();
        $categorySelect->where(array("id" => $subCategoryId, "show_in_menu" => "Y"));

        $select->join(
            array("C" => $categorySelect),
            TB_PRODUCT . ".category_id = C.id",
            array(
                "category_id" => "id",
                "category_title" => "title"
            ),
            $select::JOIN_INNER
        );

        $select->join(
            array("I" => TB_PRODUCT_IMAGE),
            TB_PRODUCT . ".id = I.product_id",
            array(
                "img_src" => "src",
                "img_alt" => "alt"
            ),
            $select::JOIN_LEFT
        );

        // limit products with page number
        $select->limit($perPage);
        $select->offset(((((int) $pageId) - 1) * $perPage ));
        $select->order('id DESC');

        $productsResultSet = $productModel->selectWith($select);
        $products = $productsResultSet->toArray();

        //sending data to view
        $this->view->categoryID = $subCategoryId;
        $this->view->categoryName = $categoriesSet[$subCategoryId - 1]['title'];

        $this->view->categories = $categories;
        $this->view->products = $products;

        if ($perPage < $productCount)
            $this->view->pager = $pagerObj->getPager();

        $this->view->pageID = "category" . $subCategoryId;
        $this->view->title = $categoriesSet[$subCategoryId - 1]['title'] . " - برند فروشگاه";
        echo $this->view->render("client");
    }

}