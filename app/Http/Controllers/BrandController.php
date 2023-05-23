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
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(Request $request, $domain = 'ae')
    {
        $country = Country::whereCode($domain)->first();
        $char = $request->get('char');
        $brands = $this->brandService->index($char);

        return view('brands.brands', [
            'brands' => $brands,
            'country' => $country
        ]);
    }


    public function brand($slug)
    {
        $country = Country::whereCode('ae')->first();
        $data = $this->brandService->brandPage($slug);

        if ($data) {
            return view('brands.brands-page', [
                'products' => $data['products'],
                'country' => $country,
                'brand' => $data['brand']
            ]);
        } else { return redirect('404');}
    }

    public function dbrand($domain, $slug)
    {
        $country = Country::whereCode($domain)->first();
        $data = $this->brandService->brandPage($slug);
        if ($data) {
            return view('brands.brands-page', [
                'products' => $data['products'],
                'country' => $country,
                'brand' => $data['brand']
            ]);
        } else { return redirect('404');}
    }
}
