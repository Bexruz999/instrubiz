<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($domain = 'ae')
    {
        $country = Country::whereCode($domain)->first();
        return view('homepage.home', ['country' => $country]);
    }
}
