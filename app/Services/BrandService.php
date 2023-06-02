<?php

namespace App\Services;


use App\Models\StoreProducer;
use App\Models\StoreProduct;

class BrandService
{
    public function index($char)
    {

        $brand_count = setting('site.brand_count', 12);
        if ($char) {
            $brands = StoreProducer::whereHas('products')->where('name', 'like', "$char%")->orderBy('name')
            ->paginate($brand_count)->withQueryString();
        } else {
            $brands = StoreProducer::whereHas('products')->orderBy('name')->paginate($brand_count)->withQueryString();
        }

        //dd($brands->links());
        return $brands;
    }

    public function brandPage($slug)
    {
        $productsCount = setting('site.brand_page_count', 20);
        $brand = StoreProducer::where('slug', $slug)->orderBy('name')->first();

        if (!empty($brand)) {
            $products = StoreProduct::with(['category' => function ($query) {
                $query->select('id', 'slug');
            }])->where('producer_id', $brand->id)->orderBy('name')->paginate($productsCount);
            return ['brand' => $brand, 'products' => $products];
        } return false;
    }

    public function home()
    {
        $brands = StoreProducer::whereHas('products')->inRandomOrder()->take(4)->orderBy('name')->get();
        return $brands;
    }
}
