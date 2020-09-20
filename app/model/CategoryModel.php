<?php

class CategoryModel extends BaseModel
{
    protected $table = TB_PRODUCT_CATEGORIES;

    public function getActiveCategory()
    {
        return $this->select(array("show_in_menu" => "Y"));
    }
}