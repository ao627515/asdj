<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Email\SendContactFormMail;
use App\Jobs\SendMails;

class ContactFormController extends Controller
{
    public function sendContactMail(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);


        SendMails::dispatch($data, 'ContactFormMail')->onQueue('emails');


        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
