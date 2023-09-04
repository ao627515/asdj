<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\PrbsCandidate;
use Illuminate\Bus\Queueable;
use App\Models\NewsLetterSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ContactForm\ContactFormMail;
use App\Mail\NewsLetter\NewsLetterSentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\PrbsCandidate\PrbsCandidateMail;
use App\Mail\NewsLetter\SubscribeConfirmationMail;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1000000000;
    public $backoff = 3660;

    public function __construct(
        public string|PrbsCandidate|array|NewsLetterSent $data,
        public string $typeMail,
        public string|null $email = null
    ) {
        //
    }

    public function handle(): void
    {
        $now = Carbon::now();
        $emailCount = Cache::get('email_count', 0);
        $emailSentTime = Cache::get('email_sent_time');

        if ($emailSentTime && $now->diffInHours($emailSentTime) >= 1) {
            Cache::forget('email_count');
            Cache::forget('last_hour');
            Cache::forget('email_sent_time');
            $emailCount = 0;
        }

        if ($emailCount < 100) {
            $this->sendEmail();
            $emailCount++;
            Cache::put('email_count', $emailCount, now()->addHour());
            Cache::put('last_hour', $now, now()->addHour());
            Cache::put('email_sent_time', $now, now()->addHour());
        } else {
            throw new \Exception('La limite de 100 e-mails par heure est atteinte. Réessaie dans une heure.');
        }
    }



    private function sendEmail(): void
    {
        switch ($this->typeMail) {
            case "ContactFormMail":
                Mail::send(new ContactFormMail($this->data));
                break;
            case "NewsLetterSentMail":
                Mail::send(new NewsLetterSentMail($this->email, $this->data));
                break;
            case "SubscribeConfirmationMail":
                Mail::send(new SubscribeConfirmationMail($this->data));
                break;
            case "PrbsCandidateMail":
                Mail::send(new PrbsCandidateMail($this->data));
                break;
                // Ajoutez d'autres cas pour d'autres types de courrier si nécessaire
        }
    }

}
