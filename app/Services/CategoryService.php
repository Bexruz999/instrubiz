<?php

namespace App\Services;


use App\Models\StoreCategory;
use App\Models\StoreProduct;

class CategoryService
{
    public function index($char)
    {
        $category_count = setting('site.catedory_count', 20);
        if ($char) {
            $categories = StoreCategory::whereHas('products')->where('name', 'like', "$char%")->orderBy('name')->paginate($category_count)
                ->withQueryString();
        } else {
            $categories = StoreCategory::whereHas('products')->orderBy('name')->paginate($category_count)->withQueryString();
        }
        return $categories;
    }
    public function categoryPage($slug)
    {
        $productsCount = setting('site.category_page_count', 20);
        $category = StoreCategory::where('slug', $slug)->first();
        if ($category) {
            $products = StoreProduct::where('category_id', $category->id)->paginate($productsCount)
                ->withQueryString();
            if ($products) {
                return [
                    'category' => $category,
                    'products' => $products
                ];
            } else { return false; }
        } return false;
    }
}
