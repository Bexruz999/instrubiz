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

        return $product;
    }
}
