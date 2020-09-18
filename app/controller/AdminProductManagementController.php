<?php

use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;

class AdminProductManagementController extends BaseController
{
    public function categoriesListAction()
    {
        $categories = (new CategoryModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->categories = $categories;
        $this->view->pageID = "categories-list";

        echo $this->view->render("admin");
    }

    public function addCategoryAction()
    {
        $newCategoryTitle = $this->getRequest("title");
        $newCategoryParentID = $this->getRequest("parent_id");
        $newCategoryDescription = $this->getRequest("description");
        $newCategoryShowInMenu = $this->getRequest("show_in_menu");

        $this->view->newCategoryTitle = $newCategoryTitle;
        $this->view->newCategoryParentID = $newCategoryParentID;
        $this->view->newCategoryDescription = $newCategoryDescription;
        $this->view->newCategoryShowInMenu = $newCategoryShowInMenu;

        $categories = (new CategoryModel())->select(function (Select $select) {
            $select->where(array("parent_id = ?" => "0"));
            $select->order('id ASC');
        });
        $this->view->categories = $categories;

        echo $this->view->render("admin");
    }

    public function editingCategoryAction($params = array())
    {
        $editingCategoryId = $params['id'];

        $this->view->editingCategoryId = $editingCategoryId;

        $categories = (new CategoryModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->categories = $categories;

        echo $this->view->render("admin");
    }

    public function editCategoryAction($params = array())
    {
        $editingCategoryId = $params['id'];
        $newCategoryTitle = $this->getRequest("title");
        $newCategoryParentID = $this->getRequest("parent_id");
        $newCategoryDescription = $this->getRequest("description");
        $newCategoryShowInMenu = $this->getRequest("show_in_menu");

        $this->view->editingCategoryId = $editingCategoryId;
        $this->view->newCategoryTitle = $newCategoryTitle;
        $this->view->newCategoryParentID = $newCategoryParentID;
        $this->view->newCategoryDescription = $newCategoryDescription;
        $this->view->newCategoryShowInMenu = $newCategoryShowInMenu;

        echo $this->view->render("admin");
    }

    public function deletingCategoryAction($params = array())
    {
        $deletingCategoryId = $params['id'];
        $this->view->deletingCategoryId = $deletingCategoryId;

        echo $this->view->render("admin");
    }

    public function removeCategoryAction($params = array())
    {
        $deletingCategoryId = $params['id'];
        $this->view->deletingCategoryId = $deletingCategoryId;

        $categories = (new CategoryModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->categories = $categories;

        echo $this->view->render("admin");
    }

    public function colorsListAction()
    {
        $colors = (new ColorModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->colors = $colors;
        $this->view->pageID = "colors-list";

        echo $this->view->render("admin");
    }

    public function addColorAction()
    {
        $newColorTitle = $this->getRequest("title");
        $newColorHexCode = $this->getRequest("hex_code");

        $this->view->newColorTitle = $newColorTitle;
        $this->view->newColorHexCode = $newColorHexCode;

        echo $this->view->render("admin");
    }

    public function editingColorAction($params = array())
    {
        $editingColorId = $params['id'];

        $this->view->editingColorId = $editingColorId;

        $colors = (new ColorModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->colors = $colors;

        echo $this->view->render("admin");
    }

    public function editColorAction($params = array())
    {
        $editingColorId = $params['id'];
        $newColorTitle = $this->getRequest("title");
        $newColorHexCode = $this->getRequest("hex_code");

        $this->view->editingColorId = $editingColorId;
        $this->view->newColorTitle = $newColorTitle;
        $this->view->newColorHexCode = $newColorHexCode;

        echo $this->view->render("admin");
    }

    public function deletingColorAction($params = array())
    {
        $deletingColorId = $params['id'];
        $this->view->deletingColorId = $deletingColorId;

        echo $this->view->render("admin");
    }

    public function removeColorAction($params = array())
    {
        $deletingColorId = $params['id'];
        $this->view->deletingColorId = $deletingColorId;

        echo $this->view->render("admin");
    }

    public function brandsListAction()
    {
        $brands = (new BrandModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->brands = $brands;
        $this->view->pageID = "brands-list";

        echo $this->view->render("admin");
    }

    public function addBrandAction()
    {
        $newBrandTitleFA = $this->getRequest("title_fa");
        $newBrandTitleEN = $this->getRequest("title_en");

        $this->view->newBrandTitleFA = $newBrandTitleFA;
        $this->view->newBrandTitleEN = $newBrandTitleEN;

        echo $this->view->render("admin");
    }

    public function editingBrandAction($params = array())
    {
        $editingBrandId = $params['id'];

        $this->view->editingBrandId = $editingBrandId;

        $brands = (new BrandModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->brands = $brands;

        echo $this->view->render("admin");
    }

    public function editBrandAction($params = array())
    {
        $editingBrandId = $params['id'];
        $newBrandTitleFA = $this->getRequest("title_fa");
        $newBrandTitleEN = $this->getRequest("title_en");
        $newBrandLogo = $this->getRequest("logo_src");

        $this->view->editingBrandId = $editingBrandId;
        $this->view->newBrandTitleFA = $newBrandTitleFA;
        $this->view->newBrandTitleEN = $newBrandTitleEN;
        $this->view->newBrandLogo = $newBrandLogo;

        echo $this->view->render("admin");
    }

    public function deletingBrandAction($params = array())
    {
        $deletingBrandId = $params['id'];
        $this->view->deletingBrandId = $deletingBrandId;

        echo $this->view->render("admin");
    }

    public function removeBrandAction($params = array())
    {
        $deletingBrandId = $params['id'];
        $this->view->deletingBrandId = $deletingBrandId;

        echo $this->view->render("admin");
    }

    public function addProductAction()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->select();

        $brandModel = new BrandModel();
        $brands = $brandModel->select();

        $colorModel = new ColorModel();
        $colors = $colorModel->select();

        $this->view->pageID = "add-product";
        $this->view->categories = $categories;
        $this->view->brands = $brands;
        $this->view->colors = $colors;

        $newProductTitleFA = $this->getRequest("title-fa");
        $newProductTitleEN = $this->getRequest("title-en");
        $newProductAlt = $this->getRequest("alt-image");
        if (empty($newProductAlt)) {
            $newProductAlt = $newProductTitleFA . ' - ' . $newProductTitleEN;
        }
        $newProductSellPrice = $this->getRequest("sell-price");
        $newProductQuantity = $this->getRequest("quantity");
        $newProductCategory = $this->getRequest("category");
        $newProductSubCategory = $this->getRequest("sub-category");
        $newProductBrand = $this->getRequest("brand");
        $newProductColor = $this->getRequest("color");
        $newProductDescription = $this->getRequest("description");
        $newProductPublish = $this->getRequest("publish");

        $newProductSellPrice = str_replace(",", '', $newProductSellPrice);
        $newProductQuantity = str_replace(",", '', $newProductQuantity);

        $this->view->newProductTitleFA = $newProductTitleFA;
        $this->view->newProductTitleEN = $newProductTitleEN;
        $this->view->newProductAlt = $newProductAlt;
        $this->view->newProductSellPrice = $newProductSellPrice;
        $this->view->newProductQuantity = $newProductQuantity;
        $this->view->newProductCategory = $newProductCategory;
        $this->view->newProductSubCategory = $newProductSubCategory;
        $this->view->newProductBrand = $newProductBrand;
        $this->view->newProductColor = $newProductColor;
        $this->view->newProductDescription = $newProductDescription;
        $this->view->newProductPublish = $newProductPublish;

        echo $this->view->render("admin");
    }

    public function productsListAction($params)
    {
        $imageModel = new ProductImageModel();
        $ProductModel = new ProductModel();

        $images = $imageModel->select();
        $pageId = $this->getRequest("pageId", 1);
        $perPage = 2;

        $select = $ProductModel->getSql()->select();
        $select->limit($perPage);
        $select->offset(((((int) $pageId) - 1) * $perPage ));
        $select->order('id DESC');

        $productsResultSet = $ProductModel->selectWith($select);
        $products = $productsResultSet->toArray();

        $select = $ProductModel->getSql()->select();
        $productCount = $select->columns(
            array("count" => new Expression("COUNT(id)"))
        );
        $productCount = $ProductModel->selectWith($select);
        $productCount = $productCount->toArray();

        $pagerObj = new AdminPager(array(
            "count" => $productCount[0]["count"],
            "perPage" => $perPage,
            "currentPage" => $pageId
        ));

        $avatar = array();
        $productImages = array();

        $i = 0;
        foreach($products as $product) {

            $productId = $product['id'];
            foreach ($images as $image) {
                if($image['product_id'] == $productId){
                    $productImages[$productId]['src'] = '/files' . $image['src'];
                    $productImages[$productId]['alt'] = $image['alt'];
                }
            }

            if($product['created_by'] == 'رسول بسامی') {
                $avatar[$i] = '/files/images/avatar-1.jpg';
            } else {
                $avatar[$i] = '/files/images/avatar-2.jpg';
            }

            $farsiTime = jdate("y/m/d l H:i", $product['created_at']);
            $products[$i]['created_at'] = $farsiTime;

            $i++;
        };

        $this->view->products = $products;
        $this->view->avatar = $avatar;
        $this->view->productImages = $productImages;
        $this->view->pager = $pagerObj->getPager();

        $this->view->pageID = "products-list";

        echo $this->view->render("admin");
    }

    public function testAction()
    {
        echo $this->view->render("admin");
    }
}