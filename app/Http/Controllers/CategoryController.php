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
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        if ($subDomain === 'instrubiz') {$subDomain = 'ae';}
        elseif ($subDomain === 'ae' || $subDomain === 'www') {
        return redirect('https://instrubiz.ae/store/categories', 301);}
        $country = Country::whereCode($subDomain)->first();
        $char = $request->get('char');
        $categories = $this->categoryService->index($char);
        return view('categories.categories', [
            'categories' => $categories,
            'country' => $country
        ]);
    }

    public function category($slug)
    {
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        if ($subDomain === 'instrubiz') {$subDomain = 'ae';}
        elseif ($subDomain === 'ae' || $subDomain === 'www') {
        return redirect("https://instrubiz.ae/store/$slug", 301);}
        $country = Country::whereCode($subDomain)->first();
        $data = $this->categoryService->categoryPage($slug);

        if ($data) {
            return view('categories.category-page', [
                'category' => $data['category'],
                'country' => $country,
                'products' => $data['products']
            ]);
        }
        return redirect('/store/categories');
    }
}
