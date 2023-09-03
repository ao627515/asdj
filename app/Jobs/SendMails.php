<?php

namespace App\Jobs;

use App\Mail\ContactForm\ContactFormMail;
use App\Mail\NewsLetter\NewsLetterSentMail;
use App\Mail\NewsLetter\SubscribeConfirmationMail;
use App\Mail\PrbsCandidate\PrbsCandidateMail;
use App\Models\PrbsCandidate;
use Illuminate\Bus\Queueable;
use App\Models\NewsLetterSent;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Mail;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string|PrbsCandidate|array|NewsLetterSent $data,
        public string $typeMail,
        public string|null $email = null
    ) {
        //
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->typeMail === "ContactFormMail") {
            Mail::send(new ContactFormMail($this->data));

        }elseif($this->typeMail === "NewsLetterSentMail") {
            Mail::send(new NewsLetterSentMail($this->email, $this->data));

        }elseif($this->typeMail === "SubscribeConfirmationMail") {
            Mail::send(new SubscribeConfirmationMail($this->data));

        }elseif($this->typeMail === "PrbsCandidateMail") {
            Mail::send(new PrbsCandidateMail($this->data));
        }
    }
}
