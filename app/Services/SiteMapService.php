<?php

namespace App\Services;


use App\Models\Country;
use App\Models\StoreCategory;
use App\Models\StoreProducer;
use App\Models\StoreProduct;

class SiteMapService
{
    public function createProductsMap()
    {
        $countries = Country::select(['code', 'name'])->get();
        $country = view('sitemaps.countrys', ['locations' => $countries]);
        file_put_contents("sitemap/sitemap-locations.xml", $country);
        $data = StoreProduct::with([
            'category' => function ($query) {
                $query->select('id', 'slug');
            }
        ])->where('category_id', '>', '0')->get();
        $productsAll = collect($data)->chunk(10000);
        $links = [];
        foreach ($productsAll as $key => $products) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . view('sitemaps.productmap', ['products' => $products]);
            file_put_contents("sitemapp/sitemap-product$key.xml", $xml);
            $links[] = $key;
        }
        $productmap = view('sitemaps.products', ['links' => $links]);
        file_put_contents("sitemap/sitemap-products.xml", $productmap);
    }

    public function createBrandsMap()
    {
        $brands = StoreProducer::select(['slug'])->whereHas('products')->get();
        $data = view('sitemaps.brands', ['brands' => $brands]);
        file_put_contents("sitemap/sitemap-brands.xml", $data);
    }

    public function createCategoriesMap()
    {
        $categories = StoreCategory::select(['slug'])->whereHas('products')->get();
        $data = view('sitemaps.categories', ['categories' => $categories]);
        file_put_contents("sitemap/sitemap-categories.xml", $data);
    }
}
