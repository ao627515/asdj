<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Models\NewsLetter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NewsLetterSent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Jobs\Email\SendNewsLetterSentMail;
use App\Mail\NewsLetter\NewsLetterSentMail;

class NewsLetterSentController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(NewsLetterSent::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news_letter_sent.index', [
            'mails' => NewsLetterSent::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news_letter_sent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'exists:users,id'],
            'message' => ['required', 'string'],
        ]);

        $mail = NewsLetterSent::create($data);

        $message = $data['message'];

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        if ($images) {
            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');

                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);

                $image_name = "news_letter_image/" . $mail->id . time() . $key . '.png';

                Storage::disk('public')->put($image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', '/storage/' . $image_name);
                $img->setAttribute('class', 'img-fluid');
            }

            $message = $dom->saveHTML();

            $mail->message = $message;
            $mail->save();
        }

        $newsletters = NewsLetter::all(); // Récupère tous les enregistrements de la table NewsLetter
        $emails = $newsletters->pluck('email'); // Extrait les adresses e-mail

        foreach ($emails as $email) {
            SendNewsLetterSentMail::dispatch($email, $mail)->onQueue('emails');
        }

        return redirect()->route('news_letter_sent.index')->with('success', 'Mail envoyé');
    }


    /**
     * Display the specified resource.
     */
    public function show(NewsLetterSent $news_letter_sent)
    {
        $previousMessage = NewsLetterSent::where('id', '<', $news_letter_sent->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextMessage = NewsLetterSent::where('id', '>', $news_letter_sent->id)
            ->orderBy('id', 'asc')
            ->first();



        return view('admin.news_letter_sent.show', [
            'mail' => $news_letter_sent,
            'next' => $nextMessage,
            'previous' => $previousMessage,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsLetter $news_letter_sent)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($news_letter_sent->content, 9);
        $images = $dom->getElementsByTagName('img');
        if ($images) {
            foreach ($images as $key => $img) {

                $src = $img->getAttribute('src');
                $path = Str::of($src)->after('/');

                if (File::exists($path)) {
                    // File::delete($path);
                    $parentDirectory  = Str::of($path)->after('storage/');
                    $parentDirectory = dirname($parentDirectory);
                    Storage::disk('public')->deleteDirectory($parentDirectory);
                    break;
                }
            }
        }

        $news_letter_sent->delete();

        return to_route('news_letter_sent.index')->with('success', 'Articles publié');
    }

    public function print(NewsLetterSent $mail)
    {
        return view('admin.news_letter_sent.print', compact('mail'));
    }

    public function checkbox(Request $request)
    {
        $data = $request->validate([
            'choices' => ['required', 'array']
        ]);

        foreach ($data['choices'] as $mailId) {

            $mail = NewsLetterSent::findOrFail($mailId);

            $this->destroy($mail);
        }

        return back();
    }
}
