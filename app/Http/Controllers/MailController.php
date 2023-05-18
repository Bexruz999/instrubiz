<?php

namespace App\Http\Controllers;

use App\Mail\ContactShipped;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test(Request $request): RedirectResponse
    {
        // Ship the order...

        Mail::to('bexruzfatullayev999@gmail.com')->send(new ContactShipped());

        return redirect('/');
    }

    public function send(Request $request)
    {
        $validated = $request->validate(['name' => ['required'], 'email' => ['required']]);
        $message = Arr::get($request, 'message', 'no message');
        $phone = Arr::get($request, 'phone', 'no phone');

        Mail::to('bexruzfatullayev999@gmail.com')->send(new ContactShipped($validated, $message, $phone));

        return response('success');
    }
}