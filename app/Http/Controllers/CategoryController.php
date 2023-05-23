<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

    public function category($slug)
    {
        $country = Country::whereCode('ae')->first();
        $data = $this->categoryService->categoryPage($slug);

        if ($data) {
            return view('categories.category-page', [
                'category' => $data['category'],
                'country' => $country,
                'products' => $data['products']
            ]);
        }
        return redirect('404');
    }

    public function dcategory($domain, $slug)
    {
        $country = Country::whereCode($domain)->first();
        $data = $this->categoryService->categoryPage($slug);

        if ($data) {
            return view('categories.category-page', [
                'category' => $data['category'],
                'country' => $country,
                'products' => $data['products'],
                'domain' => $domain
            ]);
        }
        return redirect('404');
    }
}
