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
        $brands = $this->brandSerivce->home();
        $country = Country::whereCode($domain)->first();
        return view('homepage.home', ['country' => $country , 'brands' => $brands]);
    }
}
