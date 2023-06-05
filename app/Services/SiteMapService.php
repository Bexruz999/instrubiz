<?php

namespace App\Services;


use App\Models\Country;
use App\Models\StoreCategory;
use App\Models\StoreProducer;
use App\Models\StoreProduct;

class SiteMapService
{
    public function createProductMaps()
    {
        $data = StoreProduct::with([
            'category' => function ($query) {$query->select('id', 'slug');}
        ])->where('category_id', '>', '0')->get();
        $productsAll = collect($data)->chunk(10000);

        $countries = Country::select(['code', 'name'])->get();
        foreach ($countries as $code => $name) {
            $links = [];
            foreach ($productsAll as $key => $products) {
                $data = view('sitemaps.productmap', ['products' => $products, 'code' => $code]);
                file_put_contents("sitemapp/sitemap-product$key.xml", $data);
                $links[] = $key;
            }
            $productmap = view('sitemaps.products', ['links' => $links, 'code' => $code]);

            if ($code === 'ae') {
                file_put_contents("sitemap/sitemap-products.xml", $productmap);
            } else {
                file_put_contents("sitemap/$code-sitemap-products.xml", $productmap);
            }
        }
    }

    public function createBrandMaps()
    {
        $brands = StoreProducer::select(['slug'])->whereHas('products')->get();
        $data = view('sitemaps.brands', ['brands' => $brands]);
        file_put_contents("sitemap/sitemap-brands.xml", $data);
    }

    public function createCategoryMaps()
    {
        $categories = StoreCategory::select(['slug'])->whereHas('products')->get();
        $data = view('sitemaps.categories', ['categories' => $categories]);
        file_put_contents("sitemap/sitemap-categories.xml", $data);
    }

    public function createMainSitemap()
    {
        $countries = Country::select(['code', 'name'])->get();
        $data = view('sitemaps.sitemap', ['countries' => $countries]);
        file_put_contents("sitemap/sitemap.xml", $data);
    }

    public function createSitemaps()
    {
        $countries = Country::select(['code', 'name'])->get();
        foreach ($countries as $country) {
            $data = view('sitemaps.sitemaps', ['country' => $country]);
            file_put_contents("sitemap/$country->code.sitemap.xml", $data);
        }
    }
}
