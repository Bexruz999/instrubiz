<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\StoreProducer;
use App\Services\BrandService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $brandSerivce;

    public function __construct(BrandService $brandService)
    {
        $this->brandSerivce = $brandService;
    }

    public function index($domain = 'ae')
    {
        if ($_SERVER['REQUEST_URI'] !== '/') {
            return redirect($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'], 301);
        }
        $brands = $this->brandSerivce->home();
        $country = Country::whereCode($domain)->first();
        return view('homepage.home', ['country' => $country , 'brands' => $brands]);
    }
}
