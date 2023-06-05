<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\StoreCategory;
use App\Models\StoreProducer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ContactsController extends Controller
{
    public function contacts()
    {
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        if ($subDomain === 'instrubiz') {$subDomain = 'ae';}
        elseif ($subDomain === 'ae' || $subDomain === 'www' || $subDomain === 'om') {
        return redirect('https://instrubiz.ae/contacts', 301);}

        $country = Country::whereCode($subDomain)->first();
        return view('contacts.contacts', ['country' => $country]);
    }

    public function sitemap()
    {
        $subDomain = Arr::get(explode(".", $_SERVER['HTTP_HOST']), '0');
        if ($subDomain === 'instrubiz') {$subDomain = 'ae';}
        elseif ($subDomain === 'ae' || $subDomain === 'www' || $subDomain === 'om') {
        return redirect('https://instrubiz.ae/contacts', 301);}

        $countries = Country::get();
        $categories = StoreCategory::whereHas('products')->inRandomOrder()->take(20)->orderBy('name')->get();
        $brands = StoreProducer::whereHas('products')->inRandomOrder()->take(20)->orderBy('name')->get();
        return view('contacts.sitemap', ['countries' => $countries, 'categories' => $categories, 'brands' => $brands]);
    }
}
