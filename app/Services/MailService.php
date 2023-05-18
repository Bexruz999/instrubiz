<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace App\Services;


use App\Mail\ContactShipped;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send() {
        Mail::to('bexruzfatullayev999@gmail.com')->send(new ContactShipped());
    }
}
