<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\BrandService;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public $brandSerivce;

    public function __construct(BrandService $brandService)
    {
        $this->brandSerivce = $brandService;
    }

    public function index()
    {
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        $dm = $subDomain;
        if ($subDomain === 'instrubiz' ) {$subDomain = 'ae';}
        elseif ($subDomain === 'ae' || $subDomain === 'www') {
        return redirect('https://instrubiz.ae', 301);}
        $brands = $this->brandSerivce->home();
        $country = Country::whereCode($subDomain)->first();
        return view('homepage.home', ['country' => $country , 'brands' => $brands, 'subDomain' => $dm]);
    }
}
