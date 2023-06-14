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
            'category' => function ($query) {
                $query->select('id', 'slug');
            }
        ])->where('category_id', '>', '0')->get();
        $productsAll = collect($data)->chunk(10000);

        $countries = Country::select(['code', 'name'])->get();
        foreach ($countries as $country) {
            $links = [];
            foreach ($productsAll as $key => $products) {
                $data = view('sitemaps.productmap', ['products' => $products, 'country' => $country]);
                file_put_contents("sitemapp/$country->code-sitemap-product$key.xml", $data);
                $links[] = $key;
            }
            $productmap = view('sitemaps.products', ['links' => $links, 'country' => $country]);

            file_put_contents("sitemap/$country->code-sitemap-products.xml", $productmap);
        }
    }

    public function createBrandMaps()
    {
        $countries = Country::select(['code', 'name'])->get();
        $brands = StoreProducer::select(['slug'])->whereHas('products')->get();

        foreach ($countries as $country) {
            $data = view('sitemaps.brandmap', ['brands' => $brands, 'country' => $country]);
            file_put_contents("sitemapp/$country->code-sitemap-brands.xml", $data);
        }
    }

    public function createCategoryMaps()
    {

        $countries = Country::select(['code', 'name'])->get();
        $categories = StoreCategory::select(['slug'])->whereHas('products')->get();

        foreach ($countries as $country) {
            $data = view('sitemaps.categorymap', ['categories' => $categories, 'country' => $country]);
            file_put_contents("sitemapp/$country->code-sitemap-categories.xml", $data);
        }
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
            file_put_contents("sitemap/$country->code-sitemap.xml", $data);
        }
    }
}
