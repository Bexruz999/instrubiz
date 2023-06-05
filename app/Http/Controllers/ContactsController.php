<?php

namespace App\Http\Controllers;

use App\Models\Country;
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
        $country = Country::whereCode($subDomain)->first();
        return view('contacts.sitemap', ['country' => $country]);
    }
}
