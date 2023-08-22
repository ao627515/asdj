<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Email\SendSubscribeConfirmationMail;

class NewsLetterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:news_letters,email'
        ]);

        $subscriber = NewsLetter::create($validatedData);

        // Envoyer un mail de confirmation d'abonnement
        SendSubscribeConfirmationMail::dispatch($validatedData['email'])->onQueue('emails');

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }

    public function unsubscribe(string $email)
    {


        NewsLetter::where('email', $email)->delete();


        return view('admin.news_letter.unsubscribe')->with('success', 'Unsubscribed successfully!');
    }

    public function index () {


        return view('admin.news_letter.subscriber', ['subscribers' => NewsLetter::orderBy('created_at', 'desc')->get()]);
    }

    public function destroy (NewsLetter $email) {

        $email->delete();
        return back()->with('success', 'Email supprimé');
    }
}
