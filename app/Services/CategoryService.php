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
            $categories = StoreCategory::whereHas('products')->where('name', 'like', "$char%")->paginate($category_count)
                ->withQueryString();
        } else {
            $categories = StoreCategory::whereHas('products')->paginate($category_count)->withQueryString();
        }
        return $categories;
    }
    public function categoryPage($slug)
    {
        $productsCount = setting('site.category_page_count', 20);
        $category = StoreCategory::where('slug', $slug)->first();
        $products = StoreProduct::where('category_id', $category->id)->paginate($productsCount)
            ->withQueryString();
        return [
            'category' => $category,
            'products' => $products
        ];
    }
}
