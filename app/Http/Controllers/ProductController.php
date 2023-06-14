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


    public function search(Request $request)
    {
        $query = $request->get('q');
        if (!empty($query)) {
            $products = $this->searchService->search($query);
            $test = Arr::get($products, '0');
            if ($test) {
                return view('products.search', ['products' => $products]);
            }
        }
        return redirect('/')->with('status', 'product_not_found');
    }

    public function product($category, $productSlug)
    {
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        if ($subDomain === 'instrubiz') {
            $subDomain = 'ae';
        } elseif ($subDomain === 'ae' || $subDomain === 'www' || $subDomain === 'om') {
            return redirect("https://instrubiz.ae/store/$category/$productSlug.html", 301);
        }
        $country = Country::whereCode($subDomain)->first();
        $product = $this->productService->productBySlug($productSlug);
        $test = Arr::get($product, 'product.id');

        if ($test) {
            return view('products.product-page', [
                'category' => $category,
                'country' => $country,
                'product' => $product['product'],
                'similars' => $product['similars'],
                'categories' => $product['categories'],
            ]);
        }
        return redirect('/store/categories');
    }
}
