<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request, $domain = 'ae')
    {
        $country = Country::whereCode($domain)->first();
        $char = $request->get('char');
        $categories = $this->categoryService->index($char);

        return view('categories.categories', [
        'categories' => $categories,
        'country' => $country
        ]);
    }

    public function category($slug, $domain = 'ae')
    {
        $parts = explode('.', $_SERVER['HTTP_HOST'])[0];
        if ($parts !== env('APP_URL')) {
            $country = Country::whereCode($slug)->first();
            $data = $this->categoryService->categoryPage($domain);
        } else {
            $country = Country::whereCode($domain)->first();
            $data = $this->categoryService->categoryPage($slug);
        }

        return view('categories.category-page', [
            'category' => $data['category'],
            'country' => $country,
            'products' => $data['products'],
            'domain' => $domain
        ]);
    }
}
