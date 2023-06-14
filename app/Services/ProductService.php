<?php

namespace App\Services;


use App\Models\StoreCategory;
use App\Models\StoreProducer;
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
        $categories = StoreCategory::whereHas('products', function ($query) use ($product) {
            $query->where('producer_id', $product->producer->id);
        })->take(10)->get();
        return ['product' => $product, 'similars' => $similars, 'categories' => $categories];
    }
}
