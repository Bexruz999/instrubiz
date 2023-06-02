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
        /*if ($_SERVER['REQUEST_URI'] !== '/') {
            return redirect($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'], 301);
        }*/
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        if ($subDomain === 'instrubiz' ) {$subDomain = 'ae';}
        elseif ($subDomain === 'ae' || $subDomain === 'www' || $subDomain === 'om') {
        return redirect('https://instrubiz.ae', 301);}
        $brands = $this->brandSerivce->home();
        $country = Country::whereCode($subDomain)->first();
        return view('homepage.home', ['country' => $country , 'brands' => $brands]);
    }
}
