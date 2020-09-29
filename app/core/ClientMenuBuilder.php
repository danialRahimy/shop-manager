<?php

class ClientMenuBuilder
{
    public function getMenu()
    {
        $CategoryModel = new CategoryModel();
        $categoriesSet = $CategoryModel->getActiveCategory();

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

        return $categories;
    }
}