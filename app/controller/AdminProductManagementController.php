<?php

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

        echo $this->view->render();
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
            $select->order('id ASC');
        });
        $this->view->categories = $categories;

        echo $this->view->render();
    }

    public function editingCategoryAction($params = array())
    {
        $editingCategoryId = $params['id'];

        $this->view->editingCategoryId = $editingCategoryId;

        $categories = (new CategoryModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->categories = $categories;

        echo $this->view->render();
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

        echo $this->view->render();
    }

    public function deletingCategoryAction($params = array())
    {
        $deletingCategoryId = $params['id'];
        $this->view->deletingCategoryId = $deletingCategoryId;

        echo $this->view->render();
    }
    public function removeCategoryAction($params = array())
    {
        $deletingCategoryId = $params['id'];
        $this->view->deletingCategoryId = $deletingCategoryId;

        $categories = (new CategoryModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->categories = $categories;

        echo $this->view->render();
    }



    public function colorsListAction()
    {
        $colors = (new ColorModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->colors = $colors;
        $this->view->pageID = "colors-list";

        echo $this->view->render();
    }

    public function addColorAction()
    {
        $newColorTitle = $this->getRequest("title");
        $newColorHexCode = $this->getRequest("hex_code");

        $this->view->newColorTitle = $newColorTitle;
        $this->view->newColorHexCode = $newColorHexCode;

        echo $this->view->render();
    }

    public function editingColorAction($params = array())
    {
        $editingColorId = $params['id'];

        $this->view->editingColorId = $editingColorId;

        $colors = (new ColorModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->colors = $colors;

        echo $this->view->render();
    }
    public function editColorAction($params = array())
    {
        $editingColorId = $params['id'];
        $newColorTitle = $this->getRequest("title");
        $newColorHexCode = $this->getRequest("hex_code");

        $this->view->editingColorId = $editingColorId;
        $this->view->newColorTitle = $newColorTitle;
        $this->view->newColorHexCode = $newColorHexCode;

        echo $this->view->render();
    }

    public function deletingColorAction($params = array())
    {
        $deletingColorId = $params['id'];
        $this->view->deletingColorId = $deletingColorId;

        echo $this->view->render();
    }
    public function removeColorAction($params = array())
    {
        $deletingColorId = $params['id'];
        $this->view->deletingColorId = $deletingColorId;

        echo $this->view->render();
    }



    public function brandsListAction()
    {
        $brands = (new BrandModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->brands = $brands;
        $this->view->pageID = "brands-list";

        echo $this->view->render();
    }

    public function addBrandAction()
    {
        $newBrandTitleFA = $this->getRequest("title_fa");
        $newBrandTitleEN = $this->getRequest("title_en");

        $this->view->newBrandTitleFA = $newBrandTitleFA;
        $this->view->newBrandTitleEN = $newBrandTitleEN;

        echo $this->view->render();
    }

    public function editingBrandAction($params = array())
    {
        $editingBrandId = $params['id'];

        $this->view->editingBrandId = $editingBrandId;

        $brands = (new BrandModel())->select(function (Select $select) {
            $select->order('id ASC');
        });
        $this->view->brands = $brands;

        echo $this->view->render();
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

        echo $this->view->render();
    }

    public function deletingBrandAction($params = array())
    {
        $deletingBrandId = $params['id'];
        $this->view->deletingBrandId = $deletingBrandId;

        echo $this->view->render();
    }
    public function removeBrandAction($params = array())
    {
        $deletingBrandId = $params['id'];
        $this->view->deletingBrandId = $deletingBrandId;

        echo $this->view->render();
    }


    public function productListAction()
    {

        $products = (new ProductModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->products = $products;
        $this->view->pageID = "product-list";

        echo $this->view->render();
    }

}