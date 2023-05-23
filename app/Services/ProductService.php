<?php

namespace App\Services;


use App\Models\StoreProduct;

class ProductService
{
    public function productBySlug(string $slug)
    {
        $product = StoreProduct::with([
            'category' => function ($query) {$query->select('id', 'slug', 'name');},
            'producer' => function ($query) {$query->select('id', 'slug', 'name');},
        ])->where('slug', $slug)->first();
        $similars = StoreProduct::where('category_id', $product->category->id)->take(8)->get();
        return ['product' => $product, 'similars' => $similars];
    }
}
