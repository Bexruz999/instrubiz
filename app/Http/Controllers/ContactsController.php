<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contacts($domain = 'ae')
    {
        $country = Country::whereCode($domain)->first();
        return view('contacts.contacts', ['country' => $country]);
    }
}
