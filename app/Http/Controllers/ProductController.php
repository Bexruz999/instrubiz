<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\StoreProduct;
use App\Services\ProductService;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $test = Arr::get($products,'0');
        if ($test) {
            return view('products.search', ['products' => $products]);
        } return redirect('/')->with('status', 'product_not_found');
    }

    public function product($category, $productSlug)
    {
        $country = Country::whereCode('ae')->first();
        $product = $this->productService->productBySlug($productSlug);
        $test = Arr::get($product,'product.id');

        if ($test) {
            return view('products.product-page', [
                'category' => $category,
                'country' => $country,
                'product' => $product['product'],
                'similars' => $product['similars']
            ]);
        } return redirect('404');
    }

    public function dproduct($domain, $category, $productSlug)
    {
        $country = Country::whereCode($domain)->first();
        $product = $this->productService->productBySlug($productSlug);
        $test = Arr::get($product,'product.id');
        if ($test) {
            return view('products.product-page', [
                'category' => $category,
                'country' => $country,
                'product' => $product['product'],
                'similars' => $product['similars']
            ]);
        } return redirect('404');
    }
}
