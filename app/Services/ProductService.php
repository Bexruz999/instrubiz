<?php

namespace App\Services;


use App\Models\StoreProduct;
use Illuminate\Support\Arr;

class ProductService
{
    public function productBySlug(string $slug)
    {
        $product = StoreProduct::with([
            'category' => function ($query) {$query->select('id', 'slug', 'name');},
            'producer' => function ($query) {$query->select('id', 'slug', 'name');},
        ])->where('slug', $slug)->first();
        $category = Arr::get($product, 'category.id', null);
        $similars = StoreProduct::where('category_id', $category)->take(8)->get();
        return ['product' => $product, 'similars' => $similars];
    }
}
