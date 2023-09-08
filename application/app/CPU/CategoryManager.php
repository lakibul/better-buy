<?php

namespace App\CPU;

use App\Model\Category;
use App\Model\Product;

class CategoryManager
{
    public static function parents()
    {
        return Category::with(['childes.childes'])->where('position', 0)->priority()->get();
    }

    public static function child($parent_id)
    {
        return Category::where(['parent_id' => $parent_id])->get();
    }

    public static function products($category_id)
    {
        $id = '"' . $category_id . '"';
        return Product::active()
            ->where('category_ids', 'like', "%{$id}%")->get();
        /*->whereJsonContains('category_ids', ["id" => (string)$data['id']])*/
    }
}
