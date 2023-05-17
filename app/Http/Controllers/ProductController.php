<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\StoreProduct;
use App\Services\ProductService;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $searchService;
    protected $productService;

    public function __construct(SearchService $searchService, ProductService $productService)
    {
        $this->searchService = $searchService;
        $this->productService = $productService;
    }

    public function search(Request $request, $domain = 'ae')
    {
        $query = $request->get('q');
        $products = $this->searchService->search($query);

        return view('products.search', ['products' => $products]);
    }

    public function product($category, $productSlug, $domain = 'ae')
    {
        $parts = explode('.', $_SERVER['HTTP_HOST'])[0];
        if ($parts !== env('APP_URL')) {
            $domain2 = $category;
            $category =$productSlug;
            $productSlug = $domain;
            $country = Country::whereCode($domain2)->first();
        } else {
            $country = Country::whereCode($domain)->first();
        }
        $product = $this->productService->productBySlug($productSlug);

        return view('products.product-page', [
            'category' => $category,
            'country' => $country,
            'product' => $product
        ]);
    }
}
