<?php

namespace App\Http\Controllers;


use App\Http\Requests\BrandsChar;
use App\Models\Country;
use App\Services\BrandService;
use App\Services\SearchService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(Request $request, $domain = 'ae')
    {
        $country = Country::select(['name'])->whereCode($domain)->first();
        $char = $request->get('char');
        $brands = $this->brandService->index($char);

        return view('brands.brands', [
            'brands' => $brands,
            'country' => $country
        ]);
    }


    public function brand($slug, $domain = 'ae')
    {

        $parts = explode('.', $_SERVER['HTTP_HOST'])[0];
        if ($parts !== env('APP_URL')) {
            $country = Country::whereCode($slug)->first();
            $data = $this->brandService->brandPage($domain);
        } else {
            $country = Country::whereCode($domain)->first();
            $data = $this->brandService->brandPage($slug);
        }

        return view('brands.brands-page', [
            'products' => $data['products'],
            'country' => $country,
            'brand' => $data['brand']
        ]);
    }
}
